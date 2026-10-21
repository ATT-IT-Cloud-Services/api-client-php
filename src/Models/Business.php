<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

enum BusinessFundPaymentMethod: string
{
    case Mollie = 'mollie';
    case Guthaben = 'guthaben';
}

readonly class BusinessFundContract extends Model
{
    public function __construct(
        public string $id,
        public float $commitmentAmount,
        public float $price,
        public float $overchargeFeePercent,
        public int $bindingMonths,
        public string $status,
        public float $currentUsage,
        public float $currentOvercharge,
        public ?string $bindingEndDate = null,
        public ?string $lastResetAt = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            commitmentAmount: self::float($data, 'commitmentAmount'),
            price: self::float($data, 'price'),
            overchargeFeePercent: self::float($data, 'overchargeFeePercent'),
            bindingMonths: self::int($data, 'bindingMonths'),
            status: self::string($data, 'status'),
            currentUsage: self::float($data, 'currentUsage'),
            currentOvercharge: self::float($data, 'currentOvercharge'),
            bindingEndDate: self::nullableString($data, 'bindingEndDate'),
            lastResetAt: self::nullableString($data, 'lastResetAt'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'commitmentAmount' => $this->commitmentAmount,
            'price' => $this->price,
            'overchargeFeePercent' => $this->overchargeFeePercent,
            'bindingMonths' => $this->bindingMonths,
            'status' => $this->status,
            'currentUsage' => $this->currentUsage,
            'currentOvercharge' => $this->currentOvercharge,
        ];
        if ($this->bindingEndDate !== null) {
            $result['bindingEndDate'] = $this->bindingEndDate;
        }
        if ($this->lastResetAt !== null) {
            $result['lastResetAt'] = $this->lastResetAt;
        }

        return $result;
    }
}

readonly class BusinessFundOffer extends Model
{
    public function __construct(
        public string $id,
        public float $commitmentAmount,
        public float $price,
        public float $overchargeFeePercent,
        public int $bindingMonths,
        public string $offeredAt,
        public ?string $adminNote = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            commitmentAmount: self::float($data, 'commitmentAmount'),
            price: self::float($data, 'price'),
            overchargeFeePercent: self::float($data, 'overchargeFeePercent'),
            bindingMonths: self::int($data, 'bindingMonths'),
            offeredAt: self::string($data, 'offeredAt'),
            adminNote: self::nullableString($data, 'adminNote'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'commitmentAmount' => $this->commitmentAmount,
            'price' => $this->price,
            'overchargeFeePercent' => $this->overchargeFeePercent,
            'bindingMonths' => $this->bindingMonths,
            'offeredAt' => $this->offeredAt,
        ];
        if ($this->adminNote !== null) {
            $result['adminNote'] = $this->adminNote;
        }

        return $result;
    }
}

readonly class BusinessFundStatusResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?BusinessFundContract $contract = null,
        public ?BusinessFundOffer $pendingOffer = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            contract: isset($data['contract']) && is_array($data['contract'])
                ? BusinessFundContract::fromArray($data['contract'])
                : null,
            pendingOffer: isset($data['pendingOffer']) && is_array($data['pendingOffer'])
                ? BusinessFundOffer::fromArray($data['pendingOffer'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->contract !== null) {
            $result['contract'] = $this->contract->toArray();
        }
        if ($this->pendingOffer !== null) {
            $result['pendingOffer'] = $this->pendingOffer->toArray();
        }

        return $result;
    }
}

readonly class BusinessBillingResponse extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public bool $success,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            extra: self::extra($data, ['success']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge(['success' => $this->success], $this->extra);
    }
}

readonly class RequestFundRequest extends Model
{
    public function __construct(
        public float $amount,
        public int $bindingMonths,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            amount: self::float($data, 'amount'),
            bindingMonths: self::int($data, 'bindingMonths'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'bindingMonths' => $this->bindingMonths,
        ];
    }
}

readonly class RequestFundResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?string $contractId = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            contractId: self::nullableString($data, 'contractId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->contractId !== null) {
            $result['contractId'] = $this->contractId;
        }

        return $result;
    }
}

readonly class AcceptFundRequest extends Model
{
    public function __construct(
        public BusinessFundPaymentMethod $paymentMethod,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            paymentMethod: BusinessFundPaymentMethod::from(self::string($data, 'paymentMethod')),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['paymentMethod' => $this->paymentMethod->value];
    }
}

readonly class AcceptFundResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?string $checkoutUrl = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            checkoutUrl: self::nullableString($data, 'checkoutUrl'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->checkoutUrl !== null) {
            $result['checkoutUrl'] = $this->checkoutUrl;
        }

        return $result;
    }
}
