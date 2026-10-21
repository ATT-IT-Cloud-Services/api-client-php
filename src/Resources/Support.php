<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\CreateTicketRequest;
use Ignite\ApiClient\Models\CreateTicketResponse;
use Ignite\ApiClient\Models\KnowledgeBaseResponse;
use Ignite\ApiClient\Models\ReplyTicketRequest;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\TicketDetailResponse;
use Ignite\ApiClient\Models\TicketListResponse;

final class Support extends ResourceClient
{
    public function tickets(int $limit, ?string $status = null): TicketListResponse
    {
        $query = ['limit' => $limit];
        if ($status !== null) {
            $query['status'] = $status;
        }

        return TicketListResponse::fromArray($this->requestGet('/tickets', $query));
    }

    public function ticket(string $id): TicketDetailResponse
    {
        return TicketDetailResponse::fromArray($this->requestGet('/tickets/' . $id));
    }

    public function create_ticket(CreateTicketRequest $body): CreateTicketResponse
    {
        return CreateTicketResponse::fromArray($this->requestPost('/tickets', $body->toArray()));
    }

    public function reply(string $ticketId, string $content): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestPost(
                '/tickets/' . $ticketId . '/messages',
                (new ReplyTicketRequest($content))->toArray(),
            ),
        );
    }

    public function knowledge_base(?string $lang = null): KnowledgeBaseResponse
    {
        $query = $lang !== null ? ['lang' => $lang] : null;

        return KnowledgeBaseResponse::fromArray($this->requestGet('/knowledge-base', $query));
    }

    // <generated-openapi>
    /**
     * @generated GET /feedback
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/feedback', $query);
    }

    /**
     * @generated POST /feedback
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/feedback', $body);
    }

    /**
     * @generated PATCH /tickets/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/tickets/' . self::encode($id), $body);
    }

    /**
     * @generated POST /tickets/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_create(string $id, ?array $body = null): array
    {
        return parent::requestPost('/tickets/' . self::encode($id), $body);
    }

    /**
     * @generated GET /tickets/[id]/export
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function export(string $id, ?array $query = null): array
    {
        return parent::requestGet('/tickets/' . self::encode($id) . '/export', $query);
    }

    /**
     * @generated GET /tickets/attachable-services
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function attachable_services(?array $query = null): array
    {
        return parent::requestGet('/tickets/attachable-services', $query);
    }

    /**
     * @generated GET /tickets/share-candidates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function share_candidates(?array $query = null): array
    {
        return parent::requestGet('/tickets/share-candidates', $query);
    }
    // </generated-openapi>
}
