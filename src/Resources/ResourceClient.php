<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\HttpTransport;

abstract class ResourceClient
{
    public function __construct(protected readonly HttpTransport $transport)
    {
    }

    /** @param array<string, scalar|null>|null $query */
    protected function requestGet(string $path, ?array $query = null): array
    {
        return $this->transport->get($path, $query);
    }

    /** @param array<string, mixed>|null $body */
    protected function requestPost(string $path, ?array $body = null): array
    {
        return $this->transport->post($path, $body);
    }

    /** @param array<string, mixed>|null $body */
    protected function requestPut(string $path, ?array $body = null): array
    {
        return $this->transport->put($path, $body);
    }

    /** @param array<string, mixed>|null $body */
    protected function requestPatch(string $path, ?array $body = null): array
    {
        return $this->transport->patch($path, $body);
    }

    /** @param array<string, scalar|null>|null $query @param array<string, mixed>|null $body */
    protected function requestDelete(string $path, ?array $query = null, ?array $body = null): array
    {
        return $this->transport->delete($path, $query, $body);
    }

    protected static function encode(string $value): string
    {
        return rawurlencode($value);
    }
}
