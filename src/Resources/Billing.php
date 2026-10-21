<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AddPaymentMethodResponse;
use Ignite\ApiClient\Models\InvoiceDetailResponse;
use Ignite\ApiClient\Models\InvoiceListFilters;
use Ignite\ApiClient\Models\InvoiceListResponse;
use Ignite\ApiClient\Models\InvoicePayBody;
use Ignite\ApiClient\Models\InvoicePayResult;
use Ignite\ApiClient\Models\NetPointsPreviewRequest;
use Ignite\ApiClient\Models\NetPointsPreviewResponse;
use Ignite\ApiClient\Models\PaymentMethodsResult;
use Ignite\ApiClient\Models\SetDefaultPaymentMethodRequest;
use Ignite\ApiClient\Models\SubscriptionsResponse;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\UpdatePaymentMethodLabelRequest;

final class Billing extends ResourceClient
{
    public function invoices(InvoiceListFilters $filters): InvoiceListResponse
    {
        $query = ['limit' => $filters->limit ?? 50];
        if ($filters->offset !== null) {
            $query['offset'] = $filters->offset;
        }
        if ($filters->status !== null) {
            $query['status'] = $filters->status;
        }
        if ($filters->serviceId !== null) {
            $query['serviceId'] = $filters->serviceId;
        }

        return InvoiceListResponse::fromArray($this->requestGet('/invoices', $query));
    }

    public function invoices_with_limit(int $limit): InvoiceListResponse
    {
        return $this->invoices(new InvoiceListFilters(limit: $limit));
    }

    public function invoice(string $id): InvoiceDetailResponse
    {
        return InvoiceDetailResponse::fromArray($this->requestGet('/invoices/' . $id));
    }

    public function pay_invoice(string $id, InvoicePayBody $body): InvoicePayResult
    {
        return InvoicePayResult::fromArray(
            $this->requestPost('/invoices/' . $id . '/pay', $body->toArray()),
        );
    }

    public function net_points_preview(float $orderTotal): NetPointsPreviewResponse
    {
        return NetPointsPreviewResponse::fromArray(
            $this->requestPost('/netpoints/preview', (new NetPointsPreviewRequest($orderTotal))->toArray()),
        );
    }

    public function subscriptions(): SubscriptionsResponse
    {
        return SubscriptionsResponse::fromArray($this->requestGet('/user/subscriptions'));
    }

    public function payment_methods(): PaymentMethodsResult
    {
        return PaymentMethodsResult::fromArray($this->requestGet('/account/payment-methods'));
    }

    public function add_payment_method(): AddPaymentMethodResponse
    {
        return AddPaymentMethodResponse::fromArray($this->requestPost('/account/payment-methods', []));
    }

    public function set_default_payment_method(string $mandateId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPatch(
                '/account/payment-methods',
                (new SetDefaultPaymentMethodRequest($mandateId))->toArray(),
            ),
        );
    }

    public function update_payment_method_label(
        string $mandateId,
        string $userLabel,
        bool $setDefault,
    ): SuccessResponse {
        return SuccessResponse::fromArray(
            $this->requestPatch(
                '/account/payment-methods',
                (new UpdatePaymentMethodLabelRequest($mandateId, $userLabel, $setDefault))->toArray(),
            ),
        );
    }

    public function delete_payment_method(string $mandateId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete('/account/payment-methods/' . self::encode($mandateId)),
        );
    }

    // <generated-openapi>
    /**
     * @generated GET /account/company-transfer
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function company_transfer(?array $query = null): array
    {
        return parent::requestGet('/account/company-transfer', $query);
    }

    /**
     * @generated POST /account/company-transfer
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_company_transfer(?array $body = null): array
    {
        return parent::requestPost('/account/company-transfer', $body);
    }

    /**
     * @generated GET /account/contract-partner
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function contract_partner(?array $query = null): array
    {
        return parent::requestGet('/account/contract-partner', $query);
    }

    /**
     * @generated GET /account/legal-documents
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function legal_documents(?array $query = null): array
    {
        return parent::requestGet('/account/legal-documents', $query);
    }

    /**
     * @generated GET /account/tenant-transfer
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tenant_transfer(?array $query = null): array
    {
        return parent::requestGet('/account/tenant-transfer', $query);
    }

    /**
     * @generated POST /account/tenant-transfer
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_tenant_transfer(?array $body = null): array
    {
        return parent::requestPost('/account/tenant-transfer', $body);
    }

    /**
     * @generated POST /invoices
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/invoices', $body);
    }

    /**
     * @generated GET /invoices/[id]/credit-note-document
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function credit_note_document(string $id, ?array $query = null): array
    {
        return parent::requestGet('/invoices/' . self::encode($id) . '/credit-note-document', $query);
    }

    /**
     * @generated POST /invoices/[id]/dispute
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function dispute(string $id, ?array $body = null): array
    {
        return parent::requestPost('/invoices/' . self::encode($id) . '/dispute', $body);
    }

    /**
     * @generated GET /invoices/[id]/document
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function document(string $id, ?array $query = null): array
    {
        return parent::requestGet('/invoices/' . self::encode($id) . '/document', $query);
    }

    /**
     * @generated GET /invoices/[id]/documents
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function documents(string $id, ?array $query = null): array
    {
        return parent::requestGet('/invoices/' . self::encode($id) . '/documents', $query);
    }

    /**
     * @generated GET /invoices/[id]/dunning-document
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function dunning_document(string $id, ?array $query = null): array
    {
        return parent::requestGet('/invoices/' . self::encode($id) . '/dunning-document', $query);
    }

    /**
     * @generated POST /invoices/[id]/pay/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function pay_cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/invoices/' . self::encode($id) . '/pay/cancel', $body);
    }

    /**
     * @generated POST /invoices/[id]/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/invoices/' . self::encode($id) . '/withdraw', $body);
    }

    /**
     * @generated GET /invoices/download-all
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function download_all(?array $query = null): array
    {
        return parent::requestGet('/invoices/download-all', $query);
    }

    /**
     * @generated GET /netpoints
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/netpoints', $query);
    }
    // </generated-openapi>
}
