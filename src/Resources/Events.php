<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Events extends ResourceClient
{
    /**
     * @generated GET /events
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/events', $query);
    }

    /**
     * @generated POST /events/collect
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function collect(?array $body = null): array
    {
        return parent::requestPost('/events/collect', $body);
    }
}
