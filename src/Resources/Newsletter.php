<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Newsletter extends ResourceClient
{
    /**
     * @generated GET /newsletter/unsubscribe
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function unsubscribe(?array $query = null): array
    {
        return parent::requestGet('/newsletter/unsubscribe', $query);
    }

    /**
     * @generated GET /newsletter/verify
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function verify(?array $query = null): array
    {
        return parent::requestGet('/newsletter/verify', $query);
    }
}
