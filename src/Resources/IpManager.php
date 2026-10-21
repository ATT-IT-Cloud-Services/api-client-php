<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AddIpv6Request;
use Ignite\ApiClient\Models\IpManagerListResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class IpManager extends ResourceClient
{
    public function list(): IpManagerListResponse
    {
        return IpManagerListResponse::fromArray($this->requestGet('/ip-manager'));
    }

    /** @param array<string, mixed> $body */
    public function update(string $id, array $body): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPatch('/ip-manager/' . $id, $body));
    }

    public function delete(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(parent::requestDelete('/ip-manager/' . $id));
    }

    public function add_ipv6(AddIpv6Request $body): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/ip-manager', $body->toArray()));
    }
}
