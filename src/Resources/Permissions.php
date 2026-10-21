<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Permissions extends ResourceClient
{
    /**
     * @generated DELETE /permissions
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/permissions', $query, $body);
    }

    /**
     * @generated GET /permissions
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/permissions', $query);
    }

    /**
     * @generated POST /permissions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/permissions', $body);
    }

    /**
     * @generated DELETE /permissions/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_remove(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/permissions/' . self::encode($id), $query, $body);
    }

    /**
     * @generated PATCH /permissions/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/permissions/' . self::encode($id), $body);
    }

    /**
     * @generated GET /permissions/[id]/details
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function details(string $id, ?array $query = null): array
    {
        return parent::requestGet('/permissions/' . self::encode($id) . '/details', $query);
    }

    /**
     * @generated POST /permissions/accept
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function accept(?array $body = null): array
    {
        return parent::requestPost('/permissions/accept', $body);
    }

    /**
     * @generated POST /permissions/decline
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function decline(?array $body = null): array
    {
        return parent::requestPost('/permissions/decline', $body);
    }

    /**
     * @generated GET /permissions/me
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function me(?array $query = null): array
    {
        return parent::requestGet('/permissions/me', $query);
    }
}
