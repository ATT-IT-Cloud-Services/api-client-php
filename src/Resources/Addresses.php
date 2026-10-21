<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Addresses extends ResourceClient
{
    /**
     * @generated DELETE /addresses
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/addresses', $query, $body);
    }

    /**
     * @generated GET /addresses
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/addresses', $query);
    }

    /**
     * @generated POST /addresses
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/addresses', $body);
    }

    /**
     * @generated PUT /addresses
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace(?array $body = null): array
    {
        return parent::requestPut('/addresses', $body);
    }
}
