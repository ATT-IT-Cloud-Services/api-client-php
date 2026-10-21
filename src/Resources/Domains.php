<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\AddDomainRequest;
use Ignite\ApiClient\Models\DnsRecordListResponse;
use Ignite\ApiClient\Models\DomainListResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class Domains extends ResourceClient
{
    public function list(): DomainListResponse
    {
        return DomainListResponse::fromArray($this->requestGet('/domains'));
    }

    public function add(string $domain): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/domains/add', (new AddDomainRequest($domain))->toArray()),
        );
    }

    public function records(string $domainId): DnsRecordListResponse
    {
        return DnsRecordListResponse::fromArray(
            $this->requestGet('/domains/' . $domainId . '/records'),
        );
    }

    /** @param array<string, mixed> $body */
    public function create_record(string $domainId, array $body): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost('/domains/' . $domainId . '/records', $body),
        );
    }

    public function delete_record(string $domainId, string $recordId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete('/domains/' . $domainId . '/records/' . $recordId),
        );
    }

    // <generated-openapi>
    /**
     * @generated DELETE /domains/[domainId]/delete
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_delete(string $domainId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/domains/' . self::encode($domainId) . '/delete', $query, $body);
    }

    /**
     * @generated GET /domains/[domainId]/export
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function export(string $domainId, ?array $query = null): array
    {
        return parent::requestGet('/domains/' . self::encode($domainId) . '/export', $query);
    }

    /**
     * @generated POST /domains/[domainId]/import/text
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function import_text(string $domainId, ?array $body = null): array
    {
        return parent::requestPost('/domains/' . self::encode($domainId) . '/import/text', $body);
    }

    /**
     * @generated PATCH /domains/[domainId]/records/[recordId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_records(string $domainId, string $recordId, ?array $body = null): array
    {
        return parent::requestPatch('/domains/' . self::encode($domainId) . '/records/' . self::encode($recordId), $body);
    }

    /**
     * @generated GET /domains/nameservers
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function nameservers(?array $query = null): array
    {
        return parent::requestGet('/domains/nameservers', $query);
    }

    /**
     * @generated POST /domains/order
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function order(?array $body = null): array
    {
        return parent::requestPost('/domains/order', $body);
    }

    /**
     * @generated PATCH /domains/order/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_order(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/domains/order/' . self::encode($id), $body);
    }

    /**
     * @generated POST /domains/quote
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function quote(?array $body = null): array
    {
        return parent::requestPost('/domains/quote', $body);
    }

    /**
     * @generated GET /domains/registrations
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function registrations(?array $query = null): array
    {
        return parent::requestGet('/domains/registrations', $query);
    }

    /**
     * @generated GET /domains/registrations/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_registrations(string $id, ?array $query = null): array
    {
        return parent::requestGet('/domains/registrations/' . self::encode($id), $query);
    }

    /**
     * @generated POST /domains/registrations/[id]/actions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function registrations_actions(string $id, ?array $body = null): array
    {
        return parent::requestPost('/domains/registrations/' . self::encode($id) . '/actions', $body);
    }

    /**
     * @generated GET /domains/registrations/by-service/[serviceId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function registrations_by_service(string $serviceId, ?array $query = null): array
    {
        return parent::requestGet('/domains/registrations/by-service/' . self::encode($serviceId), $query);
    }

    /**
     * @generated POST /domains/suggest
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function suggest(?array $body = null): array
    {
        return parent::requestPost('/domains/suggest', $body);
    }

    /**
     * @generated POST /domains/tld-prices
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function tld_prices(?array $body = null): array
    {
        return parent::requestPost('/domains/tld-prices', $body);
    }

    /**
     * @generated POST /domains/transfer-quote
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function transfer_quote(?array $body = null): array
    {
        return parent::requestPost('/domains/transfer-quote', $body);
    }

    /**
     * @generated GET /domains/whois
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function whois(?array $query = null): array
    {
        return parent::requestGet('/domains/whois', $query);
    }
    // </generated-openapi>
}
