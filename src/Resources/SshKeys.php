<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\CreateSshKeyRequest;
use Ignite\ApiClient\Models\GenerateSshKeyRequest;
use Ignite\ApiClient\Models\SshKeyGenerateResponse;
use Ignite\ApiClient\Models\SshKeyListResponse;
use Ignite\ApiClient\Models\SuccessResponse;

final class SshKeys extends ResourceClient
{
    public function list(): SshKeyListResponse
    {
        return SshKeyListResponse::fromArray($this->requestGet('/ssh-keys'));
    }

    public function create(CreateSshKeyRequest $body): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/ssh-keys', $body->toArray()));
    }

    public function delete(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray(parent::requestDelete('/ssh-keys/' . $id));
    }

    public function generate(GenerateSshKeyRequest $body): SshKeyGenerateResponse
    {
        return SshKeyGenerateResponse::fromArray(
            $this->requestPost('/ssh-keys/generate', $body->toArray()),
        );
    }

    // <generated-openapi>
    /**
     * @generated PATCH /ssh-keys/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/ssh-keys/' . self::encode($id), $body);
    }
    // </generated-openapi>
}
