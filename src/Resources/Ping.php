<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Ping extends ResourceClient
{
    /**
     * @generated GET /ping
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/ping', $query);
    }
}
