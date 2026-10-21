<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Preorders extends ResourceClient
{
    /**
     * @generated GET /preorders
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/preorders', $query);
    }

    /**
     * @generated POST /preorders/[id]/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/preorders/' . self::encode($id) . '/withdraw', $body);
    }
}
