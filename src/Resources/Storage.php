<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Storage extends ResourceClient
{
    /**
     * @generated GET /storage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/storage', $query);
    }

    /**
     * @generated POST /storage
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/storage', $body);
    }

    /**
     * @generated DELETE /storage/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/storage/' . self::encode($id), $query, $body);
    }

    /**
     * @generated GET /storage/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $id, ?array $query = null): array
    {
        return parent::requestGet('/storage/' . self::encode($id), $query);
    }

    /**
     * @generated PATCH /storage/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/storage/' . self::encode($id), $body);
    }

    /**
     * @generated POST /storage/[id]/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/storage/' . self::encode($id) . '/cancel', $body);
    }

    /**
     * @generated POST /storage/add-to-cart
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function add_to_cart(?array $body = null): array
    {
        return parent::requestPost('/storage/add-to-cart', $body);
    }

    /**
     * @generated GET /storage/config
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function config(?array $query = null): array
    {
        return parent::requestGet('/storage/config', $query);
    }
}
