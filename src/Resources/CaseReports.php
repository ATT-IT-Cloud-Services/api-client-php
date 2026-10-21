<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class CaseReports extends ResourceClient
{
    /**
     * @generated POST /case-reports/damage
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function damage(?array $body = null): array
    {
        return parent::requestPost('/case-reports/damage', $body);
    }

    /**
     * @generated GET /case-reports/damage/bootstrap
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function damage_bootstrap(?array $query = null): array
    {
        return parent::requestGet('/case-reports/damage/bootstrap', $query);
    }
}
