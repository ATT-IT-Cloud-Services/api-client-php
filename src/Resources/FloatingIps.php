<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\FloatingIpAssignRequest;
use Ignite\ApiClient\Models\FloatingIpListResponse;
use Ignite\ApiClient\Models\FloatingIpOptionsResponse;
use Ignite\ApiClient\Models\FloatingIpOrderRequest;
use Ignite\ApiClient\Models\FloatingIpOrderResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class FloatingIps extends ResourceClient
{
    public function list(): FloatingIpListResponse
    {
        return FloatingIpListResponse::fromArray($this->requestGet('/floating-ips'));
    }

    public function options(): FloatingIpOptionsResponse
    {
        return FloatingIpOptionsResponse::fromArray($this->requestGet('/floating-ips/options'));
    }

    public function order(FloatingIpOrderRequest $body): FloatingIpOrderResponse
    {
        return FloatingIpOrderResponse::fromArray(
            $this->requestPost('/floating-ips/order', $body->toArray()),
        );
    }

    public function assign(string $id, string $serviceId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost(
                '/floating-ips/' . self::encode($id) . '/assign',
                (new FloatingIpAssignRequest($serviceId))->toArray(),
            ),
        );
    }

    public function unassign(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/floating-ips/' . self::encode($id) . '/unassign', []),
        );
    }

    public function cancel(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/floating-ips/' . self::encode($id) . '/cancel', []),
        );
    }

    // <generated-openapi>
    /**
     * @generated GET /floating-ips/[id]/targets
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function targets(string $id, ?array $query = null): array
    {
        return parent::requestGet('/floating-ips/' . self::encode($id) . '/targets', $query);
    }
    // </generated-openapi>
}
