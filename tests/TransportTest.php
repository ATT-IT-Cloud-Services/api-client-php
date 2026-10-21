<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Tests;

use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\HttpTransport;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use ReflectionProperty;

final class TransportTest extends TestCase
{
    public function testIsApiFailureDetectsSuccessFalse(): void
    {
        $this->assertTrue($this->invokeIsApiFailure(200, ['success' => false]));
    }

    public function testIsApiFailureDetectsOkFalse(): void
    {
        $this->assertTrue($this->invokeIsApiFailure(200, ['ok' => false]));
    }

    public function testIsApiFailureAcceptsSuccessTrue(): void
    {
        $this->assertFalse($this->invokeIsApiFailure(200, ['success' => true]));
    }

    public function testBuildUrlAddsQueryParams(): void
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], '{"success":true}'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        $transport = new HttpTransport(new IgniteClientConfig('https://api.example.test'));
        $clientProperty = new ReflectionProperty(HttpTransport::class, 'client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, new Client([
            'handler' => $handlerStack,
            'http_errors' => false,
        ]));

        $transport->get('/services', ['limit' => 50]);

        $this->assertCount(1, $container);
        $uri = (string) $container[0]['request']->getUri();
        $this->assertSame('https://api.example.test/services?limit=50', $uri);
    }

    public function testBuildUrlMapsPlusPrefix(): void
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], '{"success":true}'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        $transport = new HttpTransport(new IgniteClientConfig('https://api.example.test'));
        $clientProperty = new ReflectionProperty(HttpTransport::class, 'client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, new Client([
            'handler' => $handlerStack,
            'http_errors' => false,
        ]));

        $transport->get('/plus/status');

        $this->assertCount(1, $container);
        $uri = (string) $container[0]['request']->getUri();
        $this->assertSame('https://api.example.test/plus/status', $uri);
    }

    public function testSandboxHeadersAreSent(): void
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], '{"success":true,"sandbox":true}'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        $config = new IgniteClientConfig(
            'https://api.example.test',
            sandbox: true,
            sandboxError: 'rate_limited',
            sandboxStatus: 429,
        );
        $transport = new HttpTransport($config);
        $clientProperty = new ReflectionProperty(HttpTransport::class, 'client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, new Client([
            'handler' => $handlerStack,
            'http_errors' => false,
        ]));

        $transport->get('/services');

        $this->assertCount(1, $container);
        $headers = $container[0]['request']->getHeaders();
        $this->assertSame(['true'], $headers['x-sandbox']);
        $this->assertSame(['rate_limited'], $headers['x-sandbox-error']);
        $this->assertSame(['429'], $headers['x-sandbox-status']);
    }

    public function testSandboxHeadersAreOmittedByDefault(): void
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], '{"success":true}'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        $transport = new HttpTransport(new IgniteClientConfig('https://api.example.test'));
        $clientProperty = new ReflectionProperty(HttpTransport::class, 'client');
        $clientProperty->setAccessible(true);
        $clientProperty->setValue($transport, new Client([
            'handler' => $handlerStack,
            'http_errors' => false,
        ]));

        $transport->get('/services');

        $this->assertCount(1, $container);
        $headers = $container[0]['request']->getHeaders();
        $this->assertArrayNotHasKey('x-sandbox', $headers);
        $this->assertArrayNotHasKey('x-sandbox-error', $headers);
        $this->assertArrayNotHasKey('x-sandbox-status', $headers);
    }

    /** @param array<string, mixed> $body */
    private function invokeIsApiFailure(int $status, array $body): bool
    {
        $method = new ReflectionMethod(HttpTransport::class, 'isApiFailure');
        $method->setAccessible(true);

        /** @var bool $result */
        $result = $method->invoke(null, $status, $body);

        return $result;
    }
}
