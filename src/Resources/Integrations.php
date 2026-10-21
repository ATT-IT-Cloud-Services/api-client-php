<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Integrations extends ResourceClient
{
    /**
     * @generated DELETE /integrations/modrinth/account
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_modrinth_account(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/integrations/modrinth/account', $query, $body);
    }

    /**
     * @generated GET /integrations/modrinth/account
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function modrinth_account(?array $query = null): array
    {
        return parent::requestGet('/integrations/modrinth/account', $query);
    }

    /**
     * @generated GET /integrations/modrinth/callback
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function modrinth_callback(?array $query = null): array
    {
        return parent::requestGet('/integrations/modrinth/callback', $query);
    }

    /**
     * @generated GET /integrations/modrinth/connect
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function modrinth_connect(?array $query = null): array
    {
        return parent::requestGet('/integrations/modrinth/connect', $query);
    }
}
