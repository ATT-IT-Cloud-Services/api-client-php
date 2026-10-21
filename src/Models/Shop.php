<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class SshKey extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public ?string $fingerprint = null,
        public ?string $createdAt = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            fingerprint: self::nullableString($data, 'fingerprint'),
            createdAt: self::nullableString($data, 'createdAt'),
            extra: self::extra($data, ['id', 'name', 'fingerprint', 'createdAt']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'fingerprint' => $this->fingerprint,
            'createdAt' => $this->createdAt,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class SshKeyListResponse extends Model
{
    /** @param list<SshKey> $sshKeys */
    public function __construct(
        public bool $success,
        public array $sshKeys,
        public int $limitUsed,
        public int $limitMax,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $sshKeys = [];
        foreach ($data['sshKeys'] ?? [] as $item) {
            if (is_array($item)) {
                $sshKeys[] = SshKey::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            sshKeys: $sshKeys,
            limitUsed: self::int($data, 'limitUsed'),
            limitMax: self::int($data, 'limitMax'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'sshKeys' => array_map(static fn (SshKey $k): array => $k->toArray(), $this->sshKeys),
            'limitUsed' => $this->limitUsed,
            'limitMax' => $this->limitMax,
        ];
    }
}

readonly class SshKeyGenerateResponse extends Model
{
    public function __construct(
        public bool $success,
        public string $privateKey,
        public string $publicKey,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            privateKey: self::string($data, 'privateKey'),
            publicKey: self::string($data, 'publicKey'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'privateKey' => $this->privateKey,
            'publicKey' => $this->publicKey,
        ];
    }
}

readonly class CreateSshKeyRequest extends Model
{
    public function __construct(
        public string $name,
        public string $publicKey,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            name: self::string($data, 'name'),
            publicKey: self::string($data, 'publicKey'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'publicKey' => $this->publicKey,
        ];
    }
}

readonly class GenerateSshKeyRequest extends Model
{
    public function __construct(
        public string $name,
        public string $keyType,
        public ?string $passphrase = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            name: self::string($data, 'name'),
            keyType: self::string($data, 'keyType'),
            passphrase: self::nullableString($data, 'passphrase'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'name' => $this->name,
            'keyType' => $this->keyType,
        ];
        if ($this->passphrase !== null) {
            $result['passphrase'] = $this->passphrase;
        }

        return $result;
    }
}

readonly class IpManagerEntry extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public ?string $address = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            address: self::nullableString($data, 'address'),
            extra: self::extra($data, ['id', 'address']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['id' => $this->id];
        if ($this->address !== null) {
            $result['address'] = $this->address;
        }

        return array_merge($result, $this->extra);
    }
}

readonly class IpManagerListResponse extends Model
{
    /** @param list<IpManagerEntry>|null $data @param list<IpManagerEntry>|null $subnets */
    public function __construct(
        public bool $success,
        public ?array $data = null,
        public ?array $subnets = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            data: self::nullableEntryList($data, 'data'),
            subnets: self::nullableEntryList($data, 'subnets'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->data !== null) {
            $result['data'] = array_map(static fn (IpManagerEntry $e): array => $e->toArray(), $this->data);
        }
        if ($this->subnets !== null) {
            $result['subnets'] = array_map(static fn (IpManagerEntry $e): array => $e->toArray(), $this->subnets);
        }

        return $result;
    }

    /** @return list<IpManagerEntry>|null */
    private static function nullableEntryList(array $data, string $key): ?array
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }
        if (!is_array($data[$key])) {
            throw new \InvalidArgumentException("Expected array|null at {$key}");
        }
        $items = [];
        foreach ($data[$key] as $item) {
            if (is_array($item)) {
                $items[] = IpManagerEntry::fromArray($item);
            }
        }

        return $items;
    }
}

readonly class AddIpv6Request extends Model
{
    public function __construct(
        public string $serviceId,
        public string $ipv6Address,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            serviceId: self::string($data, 'serviceId'),
            ipv6Address: self::string($data, 'ipv6Address'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'serviceId' => $this->serviceId,
            'ipv6Address' => $this->ipv6Address,
        ];
    }
}

readonly class ProductCategory extends Model
{
    /** @param list<array<string, mixed>>|null $products @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public ?array $products = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $products = null;
        if (isset($data['products']) && is_array($data['products'])) {
            $products = [];
            foreach ($data['products'] as $item) {
                if (is_array($item)) {
                    $products[] = $item;
                }
            }
        }

        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            products: $products,
            extra: self::extra($data, ['id', 'name', 'products']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'name' => $this->name,
        ];
        if ($this->products !== null) {
            $result['products'] = $this->products;
        }

        return array_merge($result, $this->extra);
    }
}

readonly class ProductsResponse extends Model
{
    /** @param list<ProductCategory>|null $categories */
    public function __construct(
        public bool $success,
        public ?array $categories = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $categories = null;
        if (isset($data['categories']) && is_array($data['categories'])) {
            $categories = [];
            foreach ($data['categories'] as $item) {
                if (is_array($item)) {
                    $categories[] = ProductCategory::fromArray($item);
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            categories: $categories,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->categories !== null) {
            $result['categories'] = array_map(static fn (ProductCategory $c): array => $c->toArray(), $this->categories);
        }

        return $result;
    }
}

readonly class ShopCountry extends Model
{
    public function __construct(
        public string $countryCode,
        public string $countryName,
        public ?bool $isDefault = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            countryCode: self::string($data, 'countryCode'),
            countryName: self::string($data, 'countryName'),
            isDefault: self::nullableBool($data, 'isDefault'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'countryCode' => $this->countryCode,
            'countryName' => $this->countryName,
        ];
        if ($this->isDefault !== null) {
            $result['isDefault'] = $this->isDefault;
        }

        return $result;
    }
}

readonly class CountriesResponse extends Model
{
    /** @param list<ShopCountry> $countries */
    public function __construct(
        public bool $success,
        public array $countries,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $countries = [];
        foreach ($data['countries'] ?? [] as $item) {
            if (is_array($item)) {
                $countries[] = ShopCountry::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            countries: $countries,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'countries' => array_map(static fn (ShopCountry $c): array => $c->toArray(), $this->countries),
        ];
    }
}
