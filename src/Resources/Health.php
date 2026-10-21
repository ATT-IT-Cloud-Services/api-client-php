<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Health extends ResourceClient
{
    /**
     * @generated GET /health
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/health', $query);
    }
}
