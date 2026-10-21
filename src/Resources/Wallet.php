<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AutoTopupCreateBody;
use Ignite\ApiClient\Models\AutoTopupCreateResponse;
use Ignite\ApiClient\Models\AutoTopupListResponse;
use Ignite\ApiClient\Models\AutoTopupUpdateBody;
use Ignite\ApiClient\Models\AutoTopupUpdateResponse;
use Ignite\ApiClient\Models\RedeemVoucherRequest;
use Ignite\ApiClient\Models\RedeemVoucherResponse;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\VoucherListResponse;

final class Wallet extends ResourceClient
{
    public function bonus_event(): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestGet('/wallet/bonus-event'));
    }

    public function auto_topup_list(): AutoTopupListResponse
    {
        return AutoTopupListResponse::fromArray($this->requestGet('/balance/auto-topup'));
    }

    public function auto_topup_create(AutoTopupCreateBody $body): AutoTopupCreateResponse
    {
        return AutoTopupCreateResponse::fromArray(
            $this->requestPost('/balance/auto-topup', $body->toArray()),
        );
    }

    public function auto_topup_update(string $id, AutoTopupUpdateBody $body): AutoTopupUpdateResponse
    {
        return AutoTopupUpdateResponse::fromArray(
            $this->requestPatch('/balance/auto-topup/' . self::encode($id), $body->toArray()),
        );
    }

    public function auto_topup_delete(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete('/balance/auto-topup/' . self::encode($id)),
        );
    }

    public function vouchers(int $limit, int $offset): VoucherListResponse
    {
        return VoucherListResponse::fromArray(
            $this->requestGet('/wallet/vouchers', ['limit' => $limit, 'offset' => $offset]),
        );
    }

    public function redeem_voucher(string $code): RedeemVoucherResponse
    {
        return RedeemVoucherResponse::fromArray(
            $this->requestPost('/wallet/vouchers/redeem', (new RedeemVoucherRequest($code))->toArray()),
        );
    }

    // <generated-openapi>
    /**
     * @generated GET /wallet/payout-request
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function payout_request(?array $query = null): array
    {
        return parent::requestGet('/wallet/payout-request', $query);
    }

    /**
     * @generated POST /wallet/payout-request
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_payout_request(?array $body = null): array
    {
        return parent::requestPost('/wallet/payout-request', $body);
    }

    /**
     * @generated GET /wallet/vouchers/[id]/certificate.pdf
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function vouchers_certificate_pdf(string $id, ?array $query = null): array
    {
        return parent::requestGet('/wallet/vouchers/' . self::encode($id) . '/certificate.pdf', $query);
    }

    /**
     * @generated GET /wallet/vouchers/[id]/code
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function vouchers_code(string $id, ?array $query = null): array
    {
        return parent::requestGet('/wallet/vouchers/' . self::encode($id) . '/code', $query);
    }

    /**
     * @generated POST /wallet/vouchers/[id]/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function vouchers_withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/wallet/vouchers/' . self::encode($id) . '/withdraw', $body);
    }

    /**
     * @generated POST /wallet/vouchers/purchase-from-balance
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function vouchers_purchase_from_balance(?array $body = null): array
    {
        return parent::requestPost('/wallet/vouchers/purchase-from-balance', $body);
    }

    /**
     * @generated GET /wallet/vouchers/purchase-status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function vouchers_purchase_status(?array $query = null): array
    {
        return parent::requestGet('/wallet/vouchers/purchase-status', $query);
    }

    /**
     * @generated POST /wallet/vouchers/purchase-with-mandate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function vouchers_purchase_with_mandate(?array $body = null): array
    {
        return parent::requestPost('/wallet/vouchers/purchase-with-mandate', $body);
    }

    /**
     * @generated POST /wallet/vouchers/purchase-with-mollie
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function vouchers_purchase_with_mollie(?array $body = null): array
    {
        return parent::requestPost('/wallet/vouchers/purchase-with-mollie', $body);
    }
    // </generated-openapi>
}
