<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class ByoipAssignmentService extends Model
{
    public function __construct(
        public string $id,
        public string $name,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

readonly class ByoipAssignment extends Model
{
    public function __construct(
        public string $id,
        public string $assignedPrefix,
        public bool $isPrimary,
        public ?ByoipAssignmentService $service = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            assignedPrefix: self::string($data, 'assignedPrefix'),
            isPrimary: self::bool($data, 'isPrimary'),
            service: isset($data['service']) && is_array($data['service'])
                ? ByoipAssignmentService::fromArray($data['service'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'assignedPrefix' => $this->assignedPrefix,
            'isPrimary' => $this->isPrimary,
        ];
        if ($this->service !== null) {
            $result['service'] = $this->service->toArray();
        }

        return $result;
    }
}

readonly class ByoipNetwork extends Model
{
    /** @param list<ByoipAssignment> $assignments */
    public function __construct(
        public string $id,
        public string $prefix,
        public int $prefixVersion,
        public string $status,
        public float $setupFeeGross,
        public float $monthlyFeeGross,
        public bool $cancelAtPeriodEnd,
        public string $ddosProtectionProvider,
        public float $tbWalletBalanceTb,
        public float $tbWalletUsedTb,
        public string $createdAt,
        public array $assignments,
        public ?string $asnNumber = null,
        public ?string $description = null,
        public ?string $locationId = null,
        public ?string $currentPeriodEnd = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $assignments = [];
        foreach ($data['assignments'] ?? [] as $item) {
            if (is_array($item)) {
                $assignments[] = ByoipAssignment::fromArray($item);
            }
        }

        return new self(
            id: self::string($data, 'id'),
            prefix: self::string($data, 'prefix'),
            prefixVersion: self::int($data, 'prefixVersion'),
            status: self::string($data, 'status'),
            setupFeeGross: self::float($data, 'setupFeeGross'),
            monthlyFeeGross: self::float($data, 'monthlyFeeGross'),
            cancelAtPeriodEnd: self::bool($data, 'cancelAtPeriodEnd'),
            ddosProtectionProvider: self::string($data, 'ddosProtectionProvider'),
            tbWalletBalanceTb: self::float($data, 'tbWalletBalanceTb'),
            tbWalletUsedTb: self::float($data, 'tbWalletUsedTb'),
            createdAt: self::string($data, 'createdAt'),
            assignments: $assignments,
            asnNumber: self::nullableString($data, 'asnNumber'),
            description: self::nullableString($data, 'description'),
            locationId: self::nullableString($data, 'locationId'),
            currentPeriodEnd: self::nullableString($data, 'currentPeriodEnd'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'prefix' => $this->prefix,
            'prefixVersion' => $this->prefixVersion,
            'status' => $this->status,
            'setupFeeGross' => $this->setupFeeGross,
            'monthlyFeeGross' => $this->monthlyFeeGross,
            'cancelAtPeriodEnd' => $this->cancelAtPeriodEnd,
            'ddosProtectionProvider' => $this->ddosProtectionProvider,
            'tbWalletBalanceTb' => $this->tbWalletBalanceTb,
            'tbWalletUsedTb' => $this->tbWalletUsedTb,
            'createdAt' => $this->createdAt,
            'assignments' => array_map(static fn (ByoipAssignment $a): array => $a->toArray(), $this->assignments),
        ];
        if ($this->asnNumber !== null) {
            $result['asnNumber'] = $this->asnNumber;
        }
        if ($this->description !== null) {
            $result['description'] = $this->description;
        }
        if ($this->locationId !== null) {
            $result['locationId'] = $this->locationId;
        }
        if ($this->currentPeriodEnd !== null) {
            $result['currentPeriodEnd'] = $this->currentPeriodEnd;
        }

        return $result;
    }
}

readonly class ByoipStatusResponse extends Model
{
    /** @param list<ByoipNetwork> $networks @param list<string> $allowedLocationIds */
    public function __construct(
        public bool $success,
        public array $networks,
        public array $allowedLocationIds,
        public float $walletPricePerTbGross,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $networks = [];
        foreach ($data['networks'] ?? [] as $item) {
            if (is_array($item)) {
                $networks[] = ByoipNetwork::fromArray($item);
            }
        }
        $allowedLocationIds = [];
        foreach ($data['allowedLocationIds'] ?? [] as $id) {
            $allowedLocationIds[] = (string) $id;
        }

        return new self(
            success: self::bool($data, 'success'),
            networks: $networks,
            allowedLocationIds: $allowedLocationIds,
            walletPricePerTbGross: self::float($data, 'walletPricePerTbGross'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'networks' => array_map(static fn (ByoipNetwork $n): array => $n->toArray(), $this->networks),
            'allowedLocationIds' => $this->allowedLocationIds,
            'walletPricePerTbGross' => $this->walletPricePerTbGross,
        ];
    }
}

readonly class ByoipAssignRequest extends Model
{
    public function __construct(
        public string $networkId,
        public string $serviceId,
        public string $assignedPrefix,
        public ?bool $isPrimary = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            networkId: self::string($data, 'networkId'),
            serviceId: self::string($data, 'serviceId'),
            assignedPrefix: self::string($data, 'assignedPrefix'),
            isPrimary: self::nullableBool($data, 'isPrimary'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'networkId' => $this->networkId,
            'serviceId' => $this->serviceId,
            'assignedPrefix' => $this->assignedPrefix,
        ];
        if ($this->isPrimary !== null) {
            $result['isPrimary'] = $this->isPrimary;
        }

        return $result;
    }
}

readonly class ByoipCancelRequest extends Model
{
    public function __construct(
        public string $networkId,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            networkId: self::string($data, 'networkId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['networkId' => $this->networkId];
    }
}
