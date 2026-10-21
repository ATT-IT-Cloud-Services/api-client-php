<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Plus extends ResourceClient
{
    /**
     * @generated POST /plus/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function cancel(?array $body = null): array
    {
        return parent::requestPost('/plus/cancel', $body);
    }

    /**
     * @generated GET /plus/forecast
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function forecast(?array $query = null): array
    {
        return parent::requestGet('/plus/forecast', $query);
    }

    /**
     * @generated GET /plus/invoices
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function invoices(?array $query = null): array
    {
        return parent::requestGet('/plus/invoices', $query);
    }

    /**
     * @generated GET /plus/pooling
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function pooling(?array $query = null): array
    {
        return parent::requestGet('/plus/pooling', $query);
    }

    /**
     * @generated PUT /plus/pooling
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_pooling(?array $body = null): array
    {
        return parent::requestPut('/plus/pooling', $body);
    }

    /**
     * @generated POST /plus/pricing-preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function pricing_preview(?array $body = null): array
    {
        return parent::requestPost('/plus/pricing-preview', $body);
    }

    /**
     * @generated POST /plus/reactivate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function reactivate(?array $body = null): array
    {
        return parent::requestPost('/plus/reactivate', $body);
    }

    /**
     * @generated POST /plus/security-plus
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function security_plus(?array $body = null): array
    {
        return parent::requestPost('/plus/security-plus', $body);
    }

    /**
     * @generated GET /plus/status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function status(?array $query = null): array
    {
        return parent::requestGet('/plus/status', $query);
    }

    /**
     * @generated POST /plus/subscribe
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscribe(?array $body = null): array
    {
        return parent::requestPost('/plus/subscribe', $body);
    }

    /**
     * @generated GET /plus/wallet
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function wallet(?array $query = null): array
    {
        return parent::requestGet('/plus/wallet', $query);
    }

    /**
     * @generated POST /plus/wallet
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_wallet(?array $body = null): array
    {
        return parent::requestPost('/plus/wallet', $body);
    }
}
