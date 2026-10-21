<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AffiliateCommissionsResponse;
use Ignite\ApiClient\Models\AffiliateMeResponse;
use Ignite\ApiClient\Models\AffiliateTaxInfoResponse;
use Ignite\ApiClient\Models\PayoutRequestsResponse;

final class Affiliates extends ResourceClient
{
    public function me(): AffiliateMeResponse
    {
        return AffiliateMeResponse::fromArray($this->requestGet('/affiliates/me'));
    }

    public function commissions(int $limit): AffiliateCommissionsResponse
    {
        return AffiliateCommissionsResponse::fromArray(
            $this->requestGet('/affiliates/me/commissions', ['limit' => $limit]),
        );
    }

    public function payout_requests(int $limit, int $offset): PayoutRequestsResponse
    {
        return PayoutRequestsResponse::fromArray(
            $this->requestGet('/affiliates/me/payout-requests', ['limit' => $limit, 'offset' => $offset]),
        );
    }

    public function tax_info(): AffiliateTaxInfoResponse
    {
        return AffiliateTaxInfoResponse::fromArray($this->requestGet('/affiliates/me/tax-info'));
    }

    // <generated-openapi>
    /**
     * @generated POST /affiliates/me/convert-to-credit
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function me_convert_to_credit(?array $body = null): array
    {
        return parent::requestPost('/affiliates/me/convert-to-credit', $body);
    }

    /**
     * @generated GET /affiliates/me/coupon-usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function me_coupon_usage(?array $query = null): array
    {
        return parent::requestGet('/affiliates/me/coupon-usage', $query);
    }

    /**
     * @generated POST /affiliates/me/credit-note/[id]/confirm
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function me_credit_note_confirm(string $id, ?array $body = null): array
    {
        return parent::requestPost('/affiliates/me/credit-note/' . self::encode($id) . '/confirm', $body);
    }

    /**
     * @generated POST /affiliates/me/credit-note/preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function me_credit_note_preview(?array $body = null): array
    {
        return parent::requestPost('/affiliates/me/credit-note/preview', $body);
    }

    /**
     * @generated GET /affiliates/me/credit-notes
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function me_credit_notes(?array $query = null): array
    {
        return parent::requestGet('/affiliates/me/credit-notes', $query);
    }

    /**
     * @generated GET /affiliates/me/credit-notes/[id]/download
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function me_credit_notes_download(string $id, ?array $query = null): array
    {
        return parent::requestGet('/affiliates/me/credit-notes/' . self::encode($id) . '/download', $query);
    }

    /**
     * @generated PATCH /affiliates/me/payout-method
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_me_payout_method(?array $body = null): array
    {
        return parent::requestPatch('/affiliates/me/payout-method', $body);
    }

    /**
     * @generated POST /affiliates/me/payout-requests
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function me_payout_requests(?array $body = null): array
    {
        return parent::requestPost('/affiliates/me/payout-requests', $body);
    }

    /**
     * @generated PUT /affiliates/me/tax-info
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_me_tax_info(?array $body = null): array
    {
        return parent::requestPut('/affiliates/me/tax-info', $body);
    }

    /**
     * @generated POST /affiliates/validate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function validate(?array $body = null): array
    {
        return parent::requestPost('/affiliates/validate', $body);
    }
    // </generated-openapi>
}
