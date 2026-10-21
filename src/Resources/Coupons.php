<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Coupons extends ResourceClient
{
    /**
     * @generated POST /coupons/preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function preview(?array $body = null): array
    {
        return parent::requestPost('/coupons/preview', $body);
    }
}
