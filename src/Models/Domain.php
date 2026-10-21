<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class Domain extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public ?string $status = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            name: self::string($data, 'name'),
            status: self::nullableString($data, 'status'),
            extra: self::extra($data, ['id', 'name', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class DnsRecord extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $recordType,
        public string $name,
        public string $content,
        public ?int $ttl = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            recordType: self::string($data, 'type'),
            name: self::string($data, 'name'),
            content: self::string($data, 'content'),
            ttl: self::nullableInt($data, 'ttl'),
            extra: self::extra($data, ['id', 'type', 'name', 'content', 'ttl']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'type' => $this->recordType,
            'name' => $this->name,
            'content' => $this->content,
        ];
        if ($this->ttl !== null) {
            $result['ttl'] = $this->ttl;
        }

        return array_merge($result, $this->extra);
    }
}

readonly class DomainListResponse extends Model
{
    /** @param list<Domain> $data */
    public function __construct(
        public bool $success,
        public array $data,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $domains = [];
        foreach ($data['data'] ?? [] as $item) {
            if (is_array($item)) {
                $domains[] = Domain::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            data: $domains,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'data' => array_map(static fn (Domain $d): array => $d->toArray(), $this->data),
        ];
    }
}

readonly class DnsRecordListResponse extends Model
{
    /** @param list<DnsRecord> $data */
    public function __construct(
        public bool $success,
        public array $data,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $records = [];
        foreach ($data['data'] ?? [] as $item) {
            if (is_array($item)) {
                $records[] = DnsRecord::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            data: $records,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'data' => array_map(static fn (DnsRecord $r): array => $r->toArray(), $this->data),
        ];
    }
}

readonly class Subdomain extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $subdomain,
        public string $domain,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            subdomain: self::string($data, 'subdomain'),
            domain: self::string($data, 'domain'),
            extra: self::extra($data, ['id', 'subdomain', 'domain']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'subdomain' => $this->subdomain,
            'domain' => $this->domain,
        ], $this->extra);
    }
}

readonly class SubdomainListResponse extends Model
{
    /** @param list<Subdomain> $data */
    public function __construct(
        public bool $success,
        public array $data,
        public int $limitUsed,
        public int $limitMax,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $subdomains = [];
        foreach ($data['data'] ?? [] as $item) {
            if (is_array($item)) {
                $subdomains[] = Subdomain::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            data: $subdomains,
            limitUsed: self::int($data, 'limitUsed'),
            limitMax: self::int($data, 'limitMax'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'data' => array_map(static fn (Subdomain $s): array => $s->toArray(), $this->data),
            'limitUsed' => $this->limitUsed,
            'limitMax' => $this->limitMax,
        ];
    }
}

readonly class AddDomainRequest extends Model
{
    public function __construct(
        public string $domain,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            domain: self::string($data, 'domain'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['domain' => $this->domain];
    }
}

readonly class AllowedDomainsResponse extends Model
{
    /** @param list<mixed> $data */
    public function __construct(
        public bool $success,
        public array $data,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $items = [];
        if (isset($data['data']) && is_array($data['data'])) {
            $items = array_values($data['data']);
        }

        return new self(
            success: self::bool($data, 'success'),
            data: $items,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'data' => $this->data,
        ];
    }
}
