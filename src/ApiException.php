<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

final class ApiException extends \RuntimeException
{
    /** @param array<string, mixed> $payload */
    public function __construct(
        public readonly string $errorCode,
        public readonly int $status,
        public readonly array $payload,
    ) {
        parent::__construct($errorCode);
    }

    /** @param array<string, mixed>|null $payload */
    public static function fromResponse(int $status, ?array $payload): self
    {
        $payload ??= [];
        $errorCode = ExtractErrorCode::extract($payload) ?? ErrorCodes::API_ERROR_UNKNOWN;

        return new self($errorCode, $status, $payload);
    }
}
