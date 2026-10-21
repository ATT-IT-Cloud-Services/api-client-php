<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\ByoipAssignRequest;
use Ignite\ApiClient\Models\ByoipCancelRequest;
use Ignite\ApiClient\Models\ByoipStatusResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class Byoip extends ResourceClient
{
    public function status(): ByoipStatusResponse
    {
        return ByoipStatusResponse::fromArray($this->requestGet('/byoip/status'));
    }

    public function assign(ByoipAssignRequest $body): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/byoip/assign', $body->toArray()));
    }

    public function unassign(string $assignmentId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete('/byoip/assign/' . self::encode($assignmentId)),
        );
    }

    public function cancel(string $networkId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/byoip/cancel', (new ByoipCancelRequest($networkId))->toArray()),
        );
    }

    // <generated-openapi>
    /**
     * @generated POST /byoip/apply
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function apply(?array $body = null): array
    {
        return parent::requestPost('/byoip/apply', $body);
    }

    /**
     * @generated GET /byoip/assign
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_assign(?array $query = null): array
    {
        return parent::requestGet('/byoip/assign', $query);
    }

    /**
     * @generated POST /byoip/deannouncement/request
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function deannouncement_request(?array $body = null): array
    {
        return parent::requestPost('/byoip/deannouncement/request', $body);
    }

    /**
     * @generated POST /byoip/migration/request
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function migration_request(?array $body = null): array
    {
        return parent::requestPost('/byoip/migration/request', $body);
    }

    /**
     * @generated POST /byoip/subscribe
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscribe(?array $body = null): array
    {
        return parent::requestPost('/byoip/subscribe', $body);
    }

    /**
     * @generated GET /byoip/transfers
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function transfers(?array $query = null): array
    {
        return parent::requestGet('/byoip/transfers', $query);
    }

    /**
     * @generated POST /byoip/transfers
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_transfers(?array $body = null): array
    {
        return parent::requestPost('/byoip/transfers', $body);
    }

    /**
     * @generated GET /byoip/wallet
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function wallet(?array $query = null): array
    {
        return parent::requestGet('/byoip/wallet', $query);
    }

    /**
     * @generated POST /byoip/wallet
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_wallet(?array $body = null): array
    {
        return parent::requestPost('/byoip/wallet', $body);
    }

    /**
     * @generated PUT /byoip/wallet
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_wallet(?array $body = null): array
    {
        return parent::requestPut('/byoip/wallet', $body);
    }
    // </generated-openapi>
}
