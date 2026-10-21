<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AllowedDomainsResponse;
use Ignite\ApiClient\Models\SubdomainListResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class Subdomains extends ResourceClient
{
    public function list(): SubdomainListResponse
    {
        return SubdomainListResponse::fromArray($this->requestGet('/subdomains'));
    }

    public function allowed_domains(): AllowedDomainsResponse
    {
        return AllowedDomainsResponse::fromArray($this->requestGet('/subdomains/domains'));
    }

    /** @param array<string, mixed> $body */
    public function create(array $body): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/subdomains', $body));
    }

    public function delete(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(parent::requestDelete('/subdomains/' . $id));
    }

    // <generated-openapi>
    /**
     * @generated PATCH /subdomains/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/subdomains/' . self::encode($id), $body);
    }
    // </generated-openapi>
}
