<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class AuditLogEntry extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $action,
        public string $createdAt,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            action: self::string($data, 'action'),
            createdAt: self::string($data, 'createdAt'),
            extra: self::extra($data, ['id', 'action', 'createdAt']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'action' => $this->action,
            'createdAt' => $this->createdAt,
        ], $this->extra);
    }
}

readonly class ApiKey extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public string $prefix,
        public string $createdAt,
        public ?string $lastUsedAt = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            prefix: self::string($data, 'prefix'),
            createdAt: self::string($data, 'createdAt'),
            lastUsedAt: self::nullableString($data, 'lastUsedAt'),
            extra: self::extra($data, ['id', 'name', 'prefix', 'createdAt', 'lastUsedAt']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'name' => $this->name,
            'prefix' => $this->prefix,
            'createdAt' => $this->createdAt,
        ];
        if ($this->lastUsedAt !== null) {
            $result['lastUsedAt'] = $this->lastUsedAt;
        }

        return array_merge($result, $this->extra);
    }
}

readonly class SupportPinResponse extends Model
{
    public function __construct(
        public ?string $supportPin = null,
        public ?string $pinExpiresAt = null,
        public ?float $pinTimeLeft = null,
        public ?float $pinCooldown = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            supportPin: self::nullableString($data, 'supportPin'),
            pinExpiresAt: self::nullableString($data, 'pinExpiresAt'),
            pinTimeLeft: self::nullableFloat($data, 'pinTimeLeft'),
            pinCooldown: self::nullableFloat($data, 'pinCooldown'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'supportPin' => $this->supportPin,
            'pinExpiresAt' => $this->pinExpiresAt,
            'pinTimeLeft' => $this->pinTimeLeft,
            'pinCooldown' => $this->pinCooldown,
        ], static fn ($v) => $v !== null);
    }
}

readonly class AuditLogResponse extends Model
{
    /** @param list<AuditLogEntry> $logs */
    public function __construct(
        public bool $success,
        public array $logs,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $logs = [];
        foreach ($data['logs'] ?? [] as $item) {
            if (is_array($item)) {
                $logs[] = AuditLogEntry::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            logs: $logs,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'logs' => array_map(static fn (AuditLogEntry $e): array => $e->toArray(), $this->logs),
        ];
    }
}

readonly class GdprExportCheckResponse extends Model
{
    /** @param list<string>|null $warnings */
    public function __construct(
        public bool $success,
        public ?array $warnings = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $warnings = null;
        if (isset($data['warnings']) && is_array($data['warnings'])) {
            $warnings = array_values(array_map('strval', $data['warnings']));
        }

        return new self(
            success: self::bool($data, 'success'),
            warnings: $warnings,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->warnings !== null) {
            $result['warnings'] = $this->warnings;
        }

        return $result;
    }
}

readonly class GdprExportConfirmRequest extends Model
{
    public function __construct(
        public string $password,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            password: self::string($data, 'password'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['password' => $this->password];
    }
}

readonly class ApiKeysListResponse extends Model
{
    /** @param list<ApiKey> $apiKeys */
    public function __construct(
        public bool $success,
        public array $apiKeys,
        public ?int $total = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $apiKeys = [];
        foreach ($data['apiKeys'] ?? [] as $item) {
            if (is_array($item)) {
                $apiKeys[] = ApiKey::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            apiKeys: $apiKeys,
            total: self::nullableInt($data, 'total'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'success' => $this->success,
            'apiKeys' => array_map(static fn (ApiKey $k): array => $k->toArray(), $this->apiKeys),
        ];
        if ($this->total !== null) {
            $result['total'] = $this->total;
        }

        return $result;
    }
}

readonly class CreateApiKeyRequest extends Model
{
    public function __construct(
        public string $name,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            name: self::string($data, 'name'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['name' => $this->name];
    }
}

readonly class CreateApiKeyResponse extends Model
{
    public function __construct(
        public bool $success,
        public ApiKey $apiKey,
        public string $secret,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            apiKey: ApiKey::fromArray($data['apiKey']),
            secret: self::string($data, 'secret'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'apiKey' => $this->apiKey->toArray(),
            'secret' => $this->secret,
        ];
    }
}
