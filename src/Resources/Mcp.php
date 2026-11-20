<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Mcp extends ResourceClient
{
    /**
     * @generated DELETE /mcp
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/mcp', $query, $body);
    }

    /**
     * @generated GET /mcp
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/mcp', $query);
    }

    /**
     * @generated POST /mcp
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/mcp', $body);
    }
}
