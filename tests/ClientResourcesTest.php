<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Tests;

use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\Resources\Container;
use Ignite\ApiClient\Resources\Plus;
use Ignite\ApiClient\Resources\PublicApi;
use Ignite\ApiClient\Resources\ResourceClient;
use Ignite\ApiClient\Resources\Team;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class ClientResourcesTest extends TestCase
{
    public function testExposesOpenApiResourceNamespaces(): void
    {
        $client = new IgniteClient(new IgniteClientConfig('https://api.example.test'));

        $this->assertInstanceOf(Team::class, $client->team);
        $this->assertInstanceOf(Container::class, $client->container);
        $this->assertInstanceOf(Plus::class, $client->plus);
        $this->assertInstanceOf(PublicApi::class, $client->publicApi);
        $this->assertTrue(method_exists($client->auth, 'login'));
        $this->assertTrue(method_exists($client->auth, 'passkeys'));
        $this->assertTrue(method_exists($client->team, 'find'));
        $this->assertTrue(method_exists($client->services, 'action'));
        $this->assertTrue(method_exists($client->services, 'find'));
    }

    public function testGeneratedFindDoesNotShadowHttpGet(): void
    {
        $httpGet = (new ReflectionClass(Team::class))->getMethod('requestGet');
        $this->assertSame(ResourceClient::class, $httpGet->getDeclaringClass()->getName());
        $this->assertFalse((new ReflectionClass(Team::class))->hasMethod('get'));
        $this->assertTrue((new ReflectionClass(Team::class))->hasMethod('find'));
        $this->assertTrue((new ReflectionClass(Team::class))->hasMethod('remove'));
    }
}
