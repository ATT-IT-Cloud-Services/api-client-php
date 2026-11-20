<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Orders extends ResourceClient
{
    /**
     * @generated GET /orders
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/orders', $query);
    }

    /**
     * @generated GET /orders/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $id, ?array $query = null): array
    {
        return parent::requestGet('/orders/' . self::encode($id), $query);
    }

    /**
     * @generated POST /orders/[id]/choice
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function choice(string $id, ?array $body = null): array
    {
        return parent::requestPost('/orders/' . self::encode($id) . '/choice', $body);
    }

    /**
     * @generated GET /orders/[id]/credit-notes/[creditNoteId]/document
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function credit_notes_document(string $id, string $creditNoteId, ?array $query = null): array
    {
        return parent::requestGet('/orders/' . self::encode($id) . '/credit-notes/' . self::encode($creditNoteId) . '/document', $query);
    }
}
