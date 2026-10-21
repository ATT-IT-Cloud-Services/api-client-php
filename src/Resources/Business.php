<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AcceptFundRequest;
use Ignite\ApiClient\Models\AcceptFundResponse;
use Ignite\ApiClient\Models\BusinessBillingResponse;
use Ignite\ApiClient\Models\BusinessFundPaymentMethod;
use Ignite\ApiClient\Models\BusinessFundStatusResponse;
use Ignite\ApiClient\Models\RequestFundRequest;
use Ignite\ApiClient\Models\RequestFundResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class Business extends ResourceClient
{
    public function fund(): BusinessFundStatusResponse
    {
        return BusinessFundStatusResponse::fromArray($this->requestGet('/business/fund'));
    }

    public function request_fund(float $amount, int $bindingMonths): RequestFundResponse
    {
        return RequestFundResponse::fromArray(
            $this->requestPost('/business/fund', (new RequestFundRequest($amount, $bindingMonths))->toArray()),
        );
    }

    public function accept_fund(string $offerId, BusinessFundPaymentMethod $paymentMethod): AcceptFundResponse
    {
        return AcceptFundResponse::fromArray(
            $this->requestPost(
                '/business/fund/' . self::encode($offerId) . '/accept',
                (new AcceptFundRequest($paymentMethod))->toArray(),
            ),
        );
    }

    public function cancel_fund(string $contractId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/business/fund/' . self::encode($contractId) . '/cancel', []),
        );
    }

    public function billing(): BusinessBillingResponse
    {
        return BusinessBillingResponse::fromArray($this->requestGet('/business/billing'));
    }

    // <generated-openapi>
    /**
     * @generated DELETE /business/billing
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_billing(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/business/billing', $query, $body);
    }

    /**
     * @generated POST /business/billing
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_billing(?array $body = null): array
    {
        return parent::requestPost('/business/billing', $body);
    }

    /**
     * @generated GET /business/eligibility
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function eligibility(?array $query = null): array
    {
        return parent::requestGet('/business/eligibility', $query);
    }

    /**
     * @generated POST /business/fund/[id]/reject
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function fund_reject(string $id, ?array $body = null): array
    {
        return parent::requestPost('/business/fund/' . self::encode($id) . '/reject', $body);
    }

    /**
     * @generated GET /business/fund/special-termination
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function fund_special_termination(?array $query = null): array
    {
        return parent::requestGet('/business/fund/special-termination', $query);
    }

    /**
     * @generated POST /business/fund/special-termination
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_fund_special_termination(?array $body = null): array
    {
        return parent::requestPost('/business/fund/special-termination', $body);
    }

    /**
     * @generated GET /business/verification
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function verification(?array $query = null): array
    {
        return parent::requestGet('/business/verification', $query);
    }

    /**
     * @generated POST /business/verification
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_verification(?array $body = null): array
    {
        return parent::requestPost('/business/verification', $body);
    }

    /**
     * @generated GET /business/verification/documents/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function verification_documents(string $id, ?array $query = null): array
    {
        return parent::requestGet('/business/verification/documents/' . self::encode($id), $query);
    }
    // </generated-openapi>
}
