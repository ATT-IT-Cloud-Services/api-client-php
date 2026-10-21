<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class SuccessResponse extends Model
{
    public function __construct(
        public bool $success,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['success' => $this->success];
    }
}

readonly class Pagination extends Model
{
    public function __construct(
        public int $total,
        public ?bool $hasMore = null,
        public ?int $offset = null,
        public ?int $limit = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            total: self::int($data, 'total'),
            hasMore: self::nullableBool($data, 'hasMore'),
            offset: self::nullableInt($data, 'offset'),
            limit: self::nullableInt($data, 'limit'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['total' => $this->total];
        if ($this->hasMore !== null) {
            $result['hasMore'] = $this->hasMore;
        }
        if ($this->offset !== null) {
            $result['offset'] = $this->offset;
        }
        if ($this->limit !== null) {
            $result['limit'] = $this->limit;
        }

        return $result;
    }
}

readonly class Country extends Model
{
    public function __construct(
        public string $countryCode,
        public string $countryName,
        public ?float $taxRate = null,
        public ?string $taxName = null,
        public ?bool $isDefault = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            countryCode: self::string($data, 'countryCode'),
            countryName: self::string($data, 'countryName'),
            taxRate: self::nullableFloat($data, 'taxRate'),
            taxName: self::nullableString($data, 'taxName'),
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
        if ($this->taxRate !== null) {
            $result['taxRate'] = $this->taxRate;
        }
        if ($this->taxName !== null) {
            $result['taxName'] = $this->taxName;
        }
        if ($this->isDefault !== null) {
            $result['isDefault'] = $this->isDefault;
        }

        return $result;
    }
}
