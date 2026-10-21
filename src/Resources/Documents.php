<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Documents extends ResourceClient
{
    /**
     * @generated GET /documents
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/documents', $query);
    }

    /**
     * @generated GET /documents/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $id, ?array $query = null): array
    {
        return parent::requestGet('/documents/' . self::encode($id), $query);
    }

    /**
     * @generated GET /documents/[id]/pdf
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function pdf(string $id, ?array $query = null): array
    {
        return parent::requestGet('/documents/' . self::encode($id) . '/pdf', $query);
    }

    /**
     * @generated POST /documents/[id]/respond
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function respond(string $id, ?array $body = null): array
    {
        return parent::requestPost('/documents/' . self::encode($id) . '/respond', $body);
    }

    /**
     * @generated GET /documents/contracts
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function contracts(?array $query = null): array
    {
        return parent::requestGet('/documents/contracts', $query);
    }

    /**
     * @generated GET /documents/contracts/[id]/versions/[version]/files/[filename]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function contracts_versions_files(string $id, string $version, string $filename, ?array $query = null): array
    {
        return parent::requestGet('/documents/contracts/' . self::encode($id) . '/versions/' . self::encode($version) . '/files/' . self::encode($filename), $query);
    }

    /**
     * @generated POST /documents/contracts/[id]/versions/[version]/respond
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function contracts_versions_respond(string $id, string $version, ?array $body = null): array
    {
        return parent::requestPost('/documents/contracts/' . self::encode($id) . '/versions/' . self::encode($version) . '/respond', $body);
    }
}
