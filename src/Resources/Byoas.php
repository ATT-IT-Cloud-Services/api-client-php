<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Byoas extends ResourceClient
{
    /**
     * @generated POST /byoas/[id]/legal
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function legal(string $id, ?array $body = null): array
    {
        return parent::requestPost('/byoas/' . self::encode($id) . '/legal', $body);
    }

    /**
     * @generated GET /byoas/[id]/networks
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function networks(string $id, ?array $query = null): array
    {
        return parent::requestGet('/byoas/' . self::encode($id) . '/networks', $query);
    }

    /**
     * @generated POST /byoas/[id]/networks
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_networks(string $id, ?array $body = null): array
    {
        return parent::requestPost('/byoas/' . self::encode($id) . '/networks', $body);
    }

    /**
     * @generated POST /byoas/apply
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function apply(?array $body = null): array
    {
        return parent::requestPost('/byoas/apply', $body);
    }

    /**
     * @generated GET /byoas/status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function status(?array $query = null): array
    {
        return parent::requestGet('/byoas/status', $query);
    }
}
