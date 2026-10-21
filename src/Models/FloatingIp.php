<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class FloatingIp extends Model
{
    public function __construct(
        public string $id,
        public string $address,
        public int $ipVersion,
        public string $status,
        public string $locationId,
        public string $locationName,
        public float $monthlyPrice,
        public bool $cancelAtPeriodEnd,
        public string $createdAt,
        public ?string $assignedServiceId = null,
        public ?string $assignedServiceName = null,
        public ?string $nextBillingAt = null,
        public ?string $subscriptionStatus = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            address: self::string($data, 'address'),
            ipVersion: self::int($data, 'ipVersion'),
            status: self::string($data, 'status'),
            locationId: self::string($data, 'locationId'),
            locationName: self::string($data, 'locationName'),
            monthlyPrice: self::float($data, 'monthlyPrice'),
            cancelAtPeriodEnd: self::bool($data, 'cancelAtPeriodEnd'),
            createdAt: self::string($data, 'createdAt'),
            assignedServiceId: self::nullableString($data, 'assignedServiceId'),
            assignedServiceName: self::nullableString($data, 'assignedServiceName'),
            nextBillingAt: self::nullableString($data, 'nextBillingAt'),
            subscriptionStatus: self::nullableString($data, 'subscriptionStatus'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'address' => $this->address,
            'ipVersion' => $this->ipVersion,
            'status' => $this->status,
            'locationId' => $this->locationId,
            'locationName' => $this->locationName,
            'assignedServiceId' => $this->assignedServiceId,
            'assignedServiceName' => $this->assignedServiceName,
            'monthlyPrice' => $this->monthlyPrice,
            'nextBillingAt' => $this->nextBillingAt,
            'subscriptionStatus' => $this->subscriptionStatus,
            'cancelAtPeriodEnd' => $this->cancelAtPeriodEnd,
            'createdAt' => $this->createdAt,
        ], static fn ($v) => $v !== null);
    }
}

readonly class FloatingIpVersionOffer extends Model
{
    public function __construct(
        public float $monthlyPrice,
        public bool $available,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            monthlyPrice: self::float($data, 'monthlyPrice'),
            available: self::bool($data, 'available'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'monthlyPrice' => $this->monthlyPrice,
            'available' => $this->available,
        ];
    }
}

readonly class FloatingIpLocationOffer extends Model
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $city = null,
        public ?string $countryCode = null,
        public ?FloatingIpVersionOffer $ipv4 = null,
        public ?FloatingIpVersionOffer $ipv6 = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            city: self::nullableString($data, 'city'),
            countryCode: self::nullableString($data, 'countryCode'),
            ipv4: isset($data['ipv4']) && is_array($data['ipv4'])
                ? FloatingIpVersionOffer::fromArray($data['ipv4'])
                : null,
            ipv6: isset($data['ipv6']) && is_array($data['ipv6'])
                ? FloatingIpVersionOffer::fromArray($data['ipv6'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'name' => $this->name,
        ];
        if ($this->city !== null) {
            $result['city'] = $this->city;
        }
        if ($this->countryCode !== null) {
            $result['countryCode'] = $this->countryCode;
        }
        if ($this->ipv4 !== null) {
            $result['ipv4'] = $this->ipv4->toArray();
        }
        if ($this->ipv6 !== null) {
            $result['ipv6'] = $this->ipv6->toArray();
        }

        return $result;
    }
}

readonly class FloatingIpListResponse extends Model
{
    /** @param list<FloatingIp> $floatingIps */
    public function __construct(
        public bool $success,
        public array $floatingIps,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $floatingIps = [];
        foreach ($data['floatingIps'] ?? [] as $item) {
            if (is_array($item)) {
                $floatingIps[] = FloatingIp::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            floatingIps: $floatingIps,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'floatingIps' => array_map(static fn (FloatingIp $ip): array => $ip->toArray(), $this->floatingIps),
        ];
    }
}

readonly class FloatingIpOptionsResponse extends Model
{
    /** @param list<FloatingIpLocationOffer> $locations */
    public function __construct(
        public bool $success,
        public array $locations,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $locations = [];
        foreach ($data['locations'] ?? [] as $item) {
            if (is_array($item)) {
                $locations[] = FloatingIpLocationOffer::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            locations: $locations,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'locations' => array_map(static fn (FloatingIpLocationOffer $l): array => $l->toArray(), $this->locations),
        ];
    }
}

readonly class FloatingIpOrderRequest extends Model
{
    public function __construct(
        public string $locationId,
        public int $ipVersion,
        public int $billingCycle,
        public string $paymentMethod,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            locationId: self::string($data, 'locationId'),
            ipVersion: self::int($data, 'ipVersion'),
            billingCycle: self::int($data, 'billingCycle'),
            paymentMethod: self::string($data, 'paymentMethod'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'locationId' => $this->locationId,
            'ipVersion' => $this->ipVersion,
            'billingCycle' => $this->billingCycle,
            'paymentMethod' => $this->paymentMethod,
        ];
    }
}

readonly class FloatingIpOrderResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?FloatingIp $floatingIp = null,
        public ?string $checkoutUrl = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            floatingIp: isset($data['floatingIp']) && is_array($data['floatingIp'])
                ? FloatingIp::fromArray($data['floatingIp'])
                : null,
            checkoutUrl: self::nullableString($data, 'checkoutUrl'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->floatingIp !== null) {
            $result['floatingIp'] = $this->floatingIp->toArray();
        }
        if ($this->checkoutUrl !== null) {
            $result['checkoutUrl'] = $this->checkoutUrl;
        }

        return $result;
    }
}

readonly class FloatingIpAssignRequest extends Model
{
    public function __construct(
        public string $serviceId,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            serviceId: self::string($data, 'serviceId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['serviceId' => $this->serviceId];
    }
}
