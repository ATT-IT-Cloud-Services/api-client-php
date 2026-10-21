<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class AutoTopupConfig extends Model
{
    public function __construct(
        public string $id,
        public bool $isActive,
        public float $amount,
        public int $dayOfMonth,
        public ?string $lastChargedAt = null,
        public ?string $nextChargeAt = null,
        public ?string $mandateVerifiedAt = null,
        public ?bool $autoRedeemVoucher = null,
        public ?string $createdAt = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            isActive: self::bool($data, 'isActive'),
            amount: self::float($data, 'amount'),
            dayOfMonth: self::int($data, 'dayOfMonth'),
            lastChargedAt: self::nullableString($data, 'lastChargedAt'),
            nextChargeAt: self::nullableString($data, 'nextChargeAt'),
            mandateVerifiedAt: self::nullableString($data, 'mandateVerifiedAt'),
            autoRedeemVoucher: self::nullableBool($data, 'autoRedeemVoucher'),
            createdAt: self::nullableString($data, 'createdAt'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'isActive' => $this->isActive,
            'amount' => $this->amount,
            'dayOfMonth' => $this->dayOfMonth,
            'lastChargedAt' => $this->lastChargedAt,
            'nextChargeAt' => $this->nextChargeAt,
            'mandateVerifiedAt' => $this->mandateVerifiedAt,
            'autoRedeemVoucher' => $this->autoRedeemVoucher,
            'createdAt' => $this->createdAt,
        ], static fn ($v) => $v !== null);
    }
}

readonly class AutoTopupCreateBody extends Model
{
    public function __construct(
        public float $amount,
        public int $dayOfMonth,
        public ?bool $autoRedeemVoucher = null,
        public ?bool $acceptTerms = null,
        public ?bool $acceptPrivacy = null,
        public ?bool $acceptExpiry = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::float($data, 'amount'),
            dayOfMonth: self::int($data, 'dayOfMonth'),
            autoRedeemVoucher: self::nullableBool($data, 'autoRedeemVoucher'),
            acceptTerms: self::nullableBool($data, 'acceptTerms'),
            acceptPrivacy: self::nullableBool($data, 'acceptPrivacy'),
            acceptExpiry: self::nullableBool($data, 'acceptExpiry'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'amount' => $this->amount,
            'dayOfMonth' => $this->dayOfMonth,
            'autoRedeemVoucher' => $this->autoRedeemVoucher,
            'acceptTerms' => $this->acceptTerms,
            'acceptPrivacy' => $this->acceptPrivacy,
            'acceptExpiry' => $this->acceptExpiry,
        ], static fn ($v) => $v !== null);
    }
}

readonly class WalletVoucher extends Model
{
    public function __construct(
        public string $id,
        public float $amount,
        public string $status,
        public ?string $code = null,
        public ?string $createdAt = null,
        public ?string $redeemedAt = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            amount: self::float($data, 'amount'),
            status: self::string($data, 'status'),
            code: self::nullableString($data, 'code'),
            createdAt: self::nullableString($data, 'createdAt'),
            redeemedAt: self::nullableString($data, 'redeemedAt'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
            'code' => $this->code,
            'createdAt' => $this->createdAt,
            'redeemedAt' => $this->redeemedAt,
        ], static fn ($v) => $v !== null);
    }
}

readonly class AutoTopupListResponse extends Model
{
    /** @param list<AutoTopupConfig> $configs */
    public function __construct(
        public bool $success,
        public array $configs,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $configs = [];
        foreach ($data['configs'] ?? [] as $item) {
            if (is_array($item)) {
                $configs[] = AutoTopupConfig::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            configs: $configs,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'configs' => array_map(static fn (AutoTopupConfig $c): array => $c->toArray(), $this->configs),
        ];
    }
}

readonly class VoucherListResponse extends Model
{
    /** @param list<WalletVoucher> $vouchers */
    public function __construct(
        public bool $success,
        public array $vouchers,
        public int $total,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $vouchers = [];
        foreach ($data['vouchers'] ?? [] as $item) {
            if (is_array($item)) {
                $vouchers[] = WalletVoucher::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            vouchers: $vouchers,
            total: self::int($data, 'total'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'vouchers' => array_map(static fn (WalletVoucher $v): array => $v->toArray(), $this->vouchers),
            'total' => $this->total,
        ];
    }
}

readonly class AutoTopupUpdateBody extends Model
{
    public function __construct(
        public ?bool $isActive = null,
        public ?float $amount = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            isActive: self::nullableBool($data, 'isActive'),
            amount: self::nullableFloat($data, 'amount'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'isActive' => $this->isActive,
            'amount' => $this->amount,
        ], static fn ($v) => $v !== null);
    }
}

readonly class AutoTopupCreateResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?AutoTopupConfig $config = null,
        public ?string $verificationCheckoutUrl = null,
        public ?bool $verificationRequired = null,
        public ?bool $deferredFirstCharge = null,
        public ?string $firstChargeOn = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            config: isset($data['config']) && is_array($data['config'])
                ? AutoTopupConfig::fromArray($data['config'])
                : null,
            verificationCheckoutUrl: self::nullableString($data, 'verificationCheckoutUrl'),
            verificationRequired: self::nullableBool($data, 'verificationRequired'),
            deferredFirstCharge: self::nullableBool($data, 'deferredFirstCharge'),
            firstChargeOn: self::nullableString($data, 'firstChargeOn'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->config !== null) {
            $result['config'] = $this->config->toArray();
        }
        if ($this->verificationCheckoutUrl !== null) {
            $result['verificationCheckoutUrl'] = $this->verificationCheckoutUrl;
        }
        if ($this->verificationRequired !== null) {
            $result['verificationRequired'] = $this->verificationRequired;
        }
        if ($this->deferredFirstCharge !== null) {
            $result['deferredFirstCharge'] = $this->deferredFirstCharge;
        }
        if ($this->firstChargeOn !== null) {
            $result['firstChargeOn'] = $this->firstChargeOn;
        }

        return $result;
    }
}

readonly class AutoTopupUpdateResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?AutoTopupConfig $config = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            config: isset($data['config']) && is_array($data['config'])
                ? AutoTopupConfig::fromArray($data['config'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->config !== null) {
            $result['config'] = $this->config->toArray();
        }

        return $result;
    }
}

readonly class RedeemVoucherRequest extends Model
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

readonly class RedeemVoucherResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?float $amount = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            amount: self::nullableFloat($data, 'amount'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->amount !== null) {
            $result['amount'] = $this->amount;
        }

        return $result;
    }
}
