<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

final class HttpTransport
{
    private Client $client;
    private string $baseUrl;
    private ClientKind $clientKind;
    private ?string $token;
    /** @var array<string, string> */
    private array $extraHeaders;
    private bool $sandbox;
    private ?string $sandboxError;
    private ?int $sandboxStatus;

    public function __construct(IgniteClientConfig $config)
    {
        $this->baseUrl = rtrim($config->baseUrl, '/');
        $this->clientKind = $config->clientKind;
        $this->token = $config->token;
        $this->extraHeaders = $config->headers;
        $this->sandbox = $config->sandbox;
        $this->sandboxError = $config->sandboxError;
        $this->sandboxStatus = $config->sandboxStatus;
        $this->client = new Client([
            'http_errors' => false,
            'timeout' => 30,
        ]);
    }

    public function setToken(?string $token): void
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    /** @param array<string, scalar|null>|null $query @param array<string, string> $headers @return array<string, mixed> */
    public function get(string $path, ?array $query = null, array $headers = []): array
    {
        return $this->request('GET', $path, $query, null, $headers);
    }

    /**
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    /** @param array<string, mixed>|null $body @param array<string, string> $headers @return array<string, mixed> */
    public function post(string $path, ?array $body = null, array $headers = []): array
    {
        return $this->request('POST', $path, null, $body, $headers);
    }

    /**
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    /** @param array<string, mixed>|null $body @param array<string, string> $headers @return array<string, mixed> */
    public function put(string $path, ?array $body = null, array $headers = []): array
    {
        return $this->request('PUT', $path, null, $body, $headers);
    }

    /**
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    /** @param array<string, mixed>|null $body @param array<string, string> $headers @return array<string, mixed> */
    public function patch(string $path, ?array $body = null, array $headers = []): array
    {
        return $this->request('PATCH', $path, null, $body, $headers);
    }

    /**
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    /** @param array<string, scalar|null>|null $query @param array<string, mixed>|null $body @param array<string, string> $headers @return array<string, mixed> */
    public function delete(string $path, ?array $query = null, ?array $body = null, array $headers = []): array
    {
        return $this->request('DELETE', $path, $query, $body, $headers);
    }

    /**
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    /** @param array<string, scalar|null>|null $query @param array<string, mixed>|null $body @param array<string, string> $headers */
    private function request(string $method, string $path, ?array $query, ?array $body, array $headers = []): array
    {
        $url = $this->baseUrl . (str_starts_with($path, '/') ? $path : '/' . $path);

        $options = [
            'headers' => array_merge($this->buildHeaders($body !== null), $headers),
        ];

        if ($query !== null) {
            $filtered = [];
            foreach ($query as $key => $value) {
                if ($value === null) {
                    continue;
                }
                $filtered[$key] = (string) $value;
            }
            if ($filtered !== []) {
                $options['query'] = $filtered;
            }
        }

        if ($body !== null) {
            $options['json'] = $body;
        }

        try {
            $response = $this->client->request($method, $url, $options);
        } catch (GuzzleException $e) {
            throw new \RuntimeException($e->getMessage(), 0, $e);
        }

        $httpStatus = $response->getStatusCode();
        $contentType = $response->getHeaderLine('Content-Type');
        $raw = (string) $response->getBody();

        /** @var array<string, mixed>|null $parsed */
        $parsed = null;
        if (str_contains($contentType, 'application/json')) {
            $decoded = json_decode($raw, true);
            $parsed = is_array($decoded) ? $decoded : null;
        } elseif ($httpStatus !== 204 && $raw !== '') {
            $parsed = ['message' => $raw];
        }

        $semanticStatus = $httpStatus;
        if (is_array($parsed) && isset($parsed['status']) && is_int($parsed['status'])) {
            $semanticStatus = $parsed['status'];
        }

        $apiFailed = is_array($parsed)
            ? self::isApiFailure($semanticStatus, $parsed)
            : ($httpStatus < 200 || $httpStatus >= 300);

        if ($apiFailed) {
            if ($semanticStatus === 401 || self::isUnauthenticated($parsed ?? [])) {
                $this->token = null;
            }
            throw ApiException::fromResponse($semanticStatus, $parsed);
        }

        return $parsed ?? [];
    }

    /** @param array<string, mixed> $body */
    private static function isApiFailure(int $semanticStatus, array $body): bool
    {
        if (array_key_exists('ok', $body) && is_bool($body['ok']) && !$body['ok']) {
            return true;
        }
        if (($body['success'] ?? null) === false) {
            return true;
        }

        return $semanticStatus < 200 || $semanticStatus >= 300;
    }

    /** @param array<string, mixed> $body */
    private static function isUnauthenticated(array $body): bool
    {
        if (($body['errorCode'] ?? null) === 'unauthenticated') {
            return true;
        }

        return ($body['message'] ?? null) === 'unauthenticated';
    }

    /** @return array<string, string> */
    private function buildHeaders(bool $isJson): array
    {
        $headers = [
            'Accept' => 'application/json',
            'X-Ignite-Client' => $this->clientKind->value,
        ];

        if ($isJson) {
            $headers['Content-Type'] = 'application/json';
        }

        if ($this->token !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->token;
        }

        if ($this->sandbox) {
            $headers['x-sandbox'] = 'true';
        }

        if ($this->sandboxError !== null) {
            $headers['x-sandbox-error'] = $this->sandboxError;
        }

        if ($this->sandboxStatus !== null) {
            $headers['x-sandbox-status'] = (string) $this->sandboxStatus;
        }

        return array_merge($headers, $this->extraHeaders);
    }
}
