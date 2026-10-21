<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class AffiliateProfile extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $code,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            code: self::string($data, 'code'),
            extra: self::extra($data, ['id', 'code']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'code' => $this->code,
        ], $this->extra);
    }
}

readonly class AffiliateCommission extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public float $amount,
        public string $status,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            amount: self::float($data, 'amount'),
            status: self::string($data, 'status'),
            extra: self::extra($data, ['id', 'amount', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
        ], $this->extra);
    }
}

readonly class AffiliateMeResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?AffiliateProfile $profile = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            profile: isset($data['profile']) && is_array($data['profile'])
                ? AffiliateProfile::fromArray($data['profile'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->profile !== null) {
            $result['profile'] = $this->profile->toArray();
        }

        return $result;
    }
}

readonly class AffiliateCommissionsResponse extends Model
{
    /** @param list<AffiliateCommission>|null $commissions */
    public function __construct(
        public bool $success,
        public ?array $commissions = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $commissions = null;
        if (isset($data['commissions']) && is_array($data['commissions'])) {
            $commissions = [];
            foreach ($data['commissions'] as $item) {
                if (is_array($item)) {
                    $commissions[] = AffiliateCommission::fromArray($item);
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            commissions: $commissions,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->commissions !== null) {
            $result['commissions'] = array_map(
                static fn (AffiliateCommission $c): array => $c->toArray(),
                $this->commissions,
            );
        }

        return $result;
    }
}

readonly class PayoutRequest extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public float $amount,
        public string $status,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            amount: self::float($data, 'amount'),
            status: self::string($data, 'status'),
            extra: self::extra($data, ['id', 'amount', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status,
        ], $this->extra);
    }
}

readonly class PayoutRequestsResponse extends Model
{
    /** @param list<PayoutRequest> $requests */
    public function __construct(
        public bool $success,
        public array $requests,
        public int $total,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $requests = [];
        foreach ($data['requests'] ?? [] as $item) {
            if (is_array($item)) {
                $requests[] = PayoutRequest::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            requests: $requests,
            total: self::int($data, 'total'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'requests' => array_map(static fn (PayoutRequest $r): array => $r->toArray(), $this->requests),
            'total' => $this->total,
        ];
    }
}

readonly class AffiliateTaxInfoResponse extends Model
{
    public function __construct(
        public bool $success,
        public mixed $taxInfo = null,
        public mixed $profile = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            taxInfo: $data['taxInfo'] ?? null,
            profile: $data['profile'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->taxInfo !== null) {
            $result['taxInfo'] = $this->taxInfo;
        }
        if ($this->profile !== null) {
            $result['profile'] = $this->profile;
        }

        return $result;
    }
}
