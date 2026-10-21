<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Traffic extends ResourceClient
{
    /**
     * @generated POST /traffic/pricing-preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function pricing_preview(?array $body = null): array
    {
        return parent::requestPost('/traffic/pricing-preview', $body);
    }
}
