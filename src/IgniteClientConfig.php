<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

final class IgniteClientConfig
{
    /** @param array<string, string> $headers */
    public function __construct(
        public readonly string $baseUrl,
        public readonly ?string $token = null,
        public readonly ClientKind $clientKind = ClientKind::Api,
        public readonly array $headers = [],
        public readonly bool $sandbox = false,
        public readonly ?string $sandboxError = null,
        public readonly ?int $sandboxStatus = null,
    ) {
    }

    public function withToken(?string $token): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $token,
            clientKind: $this->clientKind,
            headers: $this->headers,
            sandbox: $this->sandbox,
            sandboxError: $this->sandboxError,
            sandboxStatus: $this->sandboxStatus,
        );
    }

    public function withClientKind(ClientKind $clientKind): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $this->token,
            clientKind: $clientKind,
            headers: $this->headers,
            sandbox: $this->sandbox,
            sandboxError: $this->sandboxError,
            sandboxStatus: $this->sandboxStatus,
        );
    }

    /** @param array<string, string> $headers */
    public function withHeaders(array $headers): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $this->token,
            clientKind: $this->clientKind,
            headers: array_merge($this->headers, $headers),
            sandbox: $this->sandbox,
            sandboxError: $this->sandboxError,
            sandboxStatus: $this->sandboxStatus,
        );
    }

    public function withSandbox(bool $sandbox = true): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $this->token,
            clientKind: $this->clientKind,
            headers: $this->headers,
            sandbox: $sandbox,
            sandboxError: $this->sandboxError,
            sandboxStatus: $this->sandboxStatus,
        );
    }

    public function withSandboxError(?string $sandboxError): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $this->token,
            clientKind: $this->clientKind,
            headers: $this->headers,
            sandbox: $this->sandbox,
            sandboxError: $sandboxError,
            sandboxStatus: $this->sandboxStatus,
        );
    }

    public function withSandboxStatus(?int $sandboxStatus): self
    {
        return new self(
            baseUrl: $this->baseUrl,
            token: $this->token,
            clientKind: $this->clientKind,
            headers: $this->headers,
            sandbox: $this->sandbox,
            sandboxError: $this->sandboxError,
            sandboxStatus: $sandboxStatus,
        );
    }
}
