<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Webhooks extends ResourceClient
{
    /**
     * @generated POST /webhooks/stripe
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function stripe(?array $body = null): array
    {
        return parent::requestPost('/webhooks/stripe', $body);
    }
}
