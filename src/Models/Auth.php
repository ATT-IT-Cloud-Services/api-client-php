<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class User extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $email,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $nickname = null,
        public ?bool $twoFactorEnabled = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            email: self::string($data, 'email'),
            firstName: self::nullableString($data, 'firstName'),
            lastName: self::nullableString($data, 'lastName'),
            nickname: self::nullableString($data, 'nickname'),
            twoFactorEnabled: self::nullableBool($data, 'twoFactorEnabled'),
            extra: self::extra($data, ['id', 'email', 'firstName', 'lastName', 'nickname', 'twoFactorEnabled']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'nickname' => $this->nickname,
            'twoFactorEnabled' => $this->twoFactorEnabled,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class Session extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public ?string $userAgent = null,
        public ?string $ip = null,
        public ?string $createdAt = null,
        public ?string $lastActiveAt = null,
        public ?bool $isCurrent = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            userAgent: self::nullableString($data, 'userAgent'),
            ip: self::nullableString($data, 'ip'),
            createdAt: self::nullableString($data, 'createdAt'),
            lastActiveAt: self::nullableString($data, 'lastActiveAt'),
            isCurrent: self::nullableBool($data, 'isCurrent'),
            extra: self::extra($data, ['id', 'userAgent', 'ip', 'createdAt', 'lastActiveAt', 'isCurrent']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'userAgent' => $this->userAgent,
            'ip' => $this->ip,
            'createdAt' => $this->createdAt,
            'lastActiveAt' => $this->lastActiveAt,
            'isCurrent' => $this->isCurrent,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class LoginRequest extends Model
{
    public function __construct(
        public string $email,
        public string $password,
        public ?string $twoFactorCode = null,
        public bool $rememberMe = false,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            email: self::string($data, 'email'),
            password: self::string($data, 'password'),
            twoFactorCode: self::nullableString($data, 'twoFactorCode'),
            rememberMe: self::bool($data, 'rememberMe'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'email' => $this->email,
            'password' => $this->password,
            'rememberMe' => $this->rememberMe,
        ];
        if ($this->twoFactorCode !== null) {
            $result['twoFactorCode'] = $this->twoFactorCode;
        }

        return $result;
    }
}

readonly class LoginResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?string $token = null,
        public ?User $user = null,
        public ?bool $requiresTwoFactor = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            token: self::nullableString($data, 'token'),
            user: isset($data['user']) && is_array($data['user']) ? User::fromArray($data['user']) : null,
            requiresTwoFactor: self::nullableBool($data, 'requiresTwoFactor'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->token !== null) {
            $result['token'] = $this->token;
        }
        if ($this->user !== null) {
            $result['user'] = $this->user->toArray();
        }
        if ($this->requiresTwoFactor !== null) {
            $result['requiresTwoFactor'] = $this->requiresTwoFactor;
        }

        return $result;
    }
}

readonly class MeResponse extends Model
{
    public function __construct(
        public bool $success,
        public User $user,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            user: User::fromArray($data['user']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'user' => $this->user->toArray(),
        ];
    }
}

readonly class SessionsResponse extends Model
{
    /** @param list<Session> $sessions */
    public function __construct(
        public bool $success,
        public array $sessions,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $sessions = [];
        foreach ($data['sessions'] ?? [] as $item) {
            if (is_array($item)) {
                $sessions[] = Session::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            sessions: $sessions,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'sessions' => array_map(static fn (Session $s): array => $s->toArray(), $this->sessions),
        ];
    }
}

readonly class TwoFactorSetupResponse extends Model
{
    public function __construct(
        public bool $success,
        public string $secret,
        public string $otpauthUrl,
        public ?string $qrCode = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            secret: self::string($data, 'secret'),
            otpauthUrl: self::string($data, 'otpauthUrl'),
            qrCode: self::nullableString($data, 'qrCode'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'success' => $this->success,
            'secret' => $this->secret,
            'otpauthUrl' => $this->otpauthUrl,
        ];
        if ($this->qrCode !== null) {
            $result['qrCode'] = $this->qrCode;
        }

        return $result;
    }
}

readonly class TwoFactorEnableResponse extends Model
{
    /** @param list<string>|null $backupCodes */
    public function __construct(
        public bool $success,
        public ?array $backupCodes = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $backupCodes = null;
        if (isset($data['backupCodes']) && is_array($data['backupCodes'])) {
            $backupCodes = array_values(array_map('strval', $data['backupCodes']));
        }

        return new self(
            success: self::bool($data, 'success'),
            backupCodes: $backupCodes,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->backupCodes !== null) {
            $result['backupCodes'] = $this->backupCodes;
        }

        return $result;
    }
}

readonly class UpdateProfileRequest extends Model
{
    public function __construct(
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $nickname = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            firstName: self::nullableString($data, 'firstName'),
            lastName: self::nullableString($data, 'lastName'),
            nickname: self::nullableString($data, 'nickname'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'nickname' => $this->nickname,
        ], static fn ($v) => $v !== null);
    }
}

readonly class ChangePasswordRequest extends Model
{
    public function __construct(
        public string $currentPassword,
        public string $newPassword,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            currentPassword: self::string($data, 'currentPassword'),
            newPassword: self::string($data, 'newPassword'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'currentPassword' => $this->currentPassword,
            'newPassword' => $this->newPassword,
        ];
    }
}

readonly class Disable2faRequest extends Model
{
    public function __construct(
        public string $code,
        public string $password,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            code: self::string($data, 'code'),
            password: self::string($data, 'password'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'password' => $this->password,
        ];
    }
}

readonly class Disable2faResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?bool $twoFactorStillEnabled = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            twoFactorStillEnabled: self::nullableBool($data, 'twoFactorStillEnabled'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->twoFactorStillEnabled !== null) {
            $result['twoFactorStillEnabled'] = $this->twoFactorStillEnabled;
        }

        return $result;
    }
}

readonly class Enable2faRequest extends Model
{
    public function __construct(
        public string $code,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            code: self::string($data, 'code'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['code' => $this->code];
    }
}
