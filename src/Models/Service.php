<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class Service extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $name,
        public ?string $status = null,
        public ?string $productName = null,
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
            productName: self::nullableString($data, 'productName'),
            extra: self::extra($data, ['id', 'name', 'status', 'productName']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'productName' => $this->productName,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class ProviderViewIdentity extends Model
{
    public function __construct(
        public string $name,
        public ?string $displayName = null,
        public ?string $status = null,
        public ?string $primaryIpv4 = null,
        public ?string $primaryIpv6 = null,
        public ?string $productName = null,
        public ?string $node = null,
        public ?string $region = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            name: self::string($data, 'name'),
            displayName: self::nullableString($data, 'displayName'),
            status: self::nullableString($data, 'status'),
            primaryIpv4: self::nullableString($data, 'primaryIpv4'),
            primaryIpv6: self::nullableString($data, 'primaryIpv6'),
            productName: self::nullableString($data, 'productName'),
            node: self::nullableString($data, 'node'),
            region: self::nullableString($data, 'region'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'name' => $this->name,
            'displayName' => $this->displayName,
            'status' => $this->status,
            'primaryIpv4' => $this->primaryIpv4,
            'primaryIpv6' => $this->primaryIpv6,
            'productName' => $this->productName,
            'node' => $this->node,
            'region' => $this->region,
        ], static fn ($v) => $v !== null);
    }
}

readonly class ProviderViewResponse extends Model
{
    /** @param list<mixed>|null $layout @param list<mixed>|null $tabs @param list<mixed>|null $fields @param list<mixed>|null $overviewFields @param list<mixed>|null $actions @param list<mixed>|null $widgets */
    public function __construct(
        public bool $success,
        public ?bool $enabled = null,
        public ?string $providerType = null,
        public ?array $layout = null,
        public ?array $tabs = null,
        public ?array $fields = null,
        public ?array $overviewFields = null,
        public ?array $actions = null,
        public ?array $widgets = null,
        public ?ProviderViewIdentity $identity = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            enabled: self::nullableBool($data, 'enabled'),
            providerType: self::nullableString($data, 'providerType'),
            layout: self::nullableMixedList($data, 'layout'),
            tabs: self::nullableMixedList($data, 'tabs'),
            fields: self::nullableMixedList($data, 'fields'),
            overviewFields: self::nullableMixedList($data, 'overviewFields'),
            actions: self::nullableMixedList($data, 'actions'),
            widgets: self::nullableMixedList($data, 'widgets'),
            identity: isset($data['identity']) && is_array($data['identity'])
                ? ProviderViewIdentity::fromArray($data['identity'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->enabled !== null) {
            $result['enabled'] = $this->enabled;
        }
        if ($this->providerType !== null) {
            $result['providerType'] = $this->providerType;
        }
        if ($this->layout !== null) {
            $result['layout'] = $this->layout;
        }
        if ($this->tabs !== null) {
            $result['tabs'] = $this->tabs;
        }
        if ($this->fields !== null) {
            $result['fields'] = $this->fields;
        }
        if ($this->overviewFields !== null) {
            $result['overviewFields'] = $this->overviewFields;
        }
        if ($this->actions !== null) {
            $result['actions'] = $this->actions;
        }
        if ($this->widgets !== null) {
            $result['widgets'] = $this->widgets;
        }
        if ($this->identity !== null) {
            $result['identity'] = $this->identity->toArray();
        }

        return $result;
    }

    /** @return list<mixed>|null */
    private static function nullableMixedList(array $data, string $key): ?array
    {
        if (!array_key_exists($key, $data) || $data[$key] === null) {
            return null;
        }
        if (!is_array($data[$key])) {
            throw new \InvalidArgumentException("Expected array|null at {$key}");
        }

        return array_values($data[$key]);
    }
}

readonly class ActionDispatchResponse extends Model
{
    /** @param array<string, mixed>|null $data */
    public function __construct(
        public bool $success,
        public ?string $status = null,
        public ?array $data = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $payload = null;
        if (isset($data['data']) && is_array($data['data'])) {
            $payload = $data['data'];
        }

        return new self(
            success: self::bool($data, 'success'),
            status: self::nullableString($data, 'status'),
            data: $payload,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->status !== null) {
            $result['status'] = $this->status;
        }
        if ($this->data !== null) {
            $result['data'] = $this->data;
        }

        return $result;
    }
}

readonly class ServiceListPagination extends Model
{
    public function __construct(
        public int $total,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            total: self::int($data, 'total'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['total' => $this->total];
    }
}

readonly class ServiceListResponse extends Model
{
    /** @param list<Service>|null $servers @param list<Service>|null $services */
    public function __construct(
        public bool $success,
        public ?array $servers = null,
        public ?array $services = null,
        public ?ServiceListPagination $pagination = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            servers: self::nullableServiceList($data, 'servers'),
            services: self::nullableServiceList($data, 'services'),
            pagination: isset($data['pagination']) && is_array($data['pagination'])
                ? ServiceListPagination::fromArray($data['pagination'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->servers !== null) {
            $result['servers'] = array_map(static fn (Service $s): array => $s->toArray(), $this->servers);
        }
        if ($this->services !== null) {
            $result['services'] = array_map(static fn (Service $s): array => $s->toArray(), $this->services);
        }
        if ($this->pagination !== null) {
            $result['pagination'] = $this->pagination->toArray();
        }

        return $result;
    }

    /** @return list<Service>|null */
    private static function nullableServiceList(array $data, string $key): ?array
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
                $items[] = Service::fromArray($item);
            }
        }

        return $items;
    }
}

readonly class ServiceDetailResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?Service $server = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            server: isset($data['server']) && is_array($data['server'])
                ? Service::fromArray($data['server'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->server !== null) {
            $result['server'] = $this->server->toArray();
        }

        return $result;
    }
}

readonly class StatusBatchRequest extends Model
{
    /** @param list<string> $ids */
    public function __construct(
        public array $ids,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $ids = [];
        foreach ($data['ids'] ?? [] as $id) {
            $ids[] = (string) $id;
        }

        return new self(ids: $ids);
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['ids' => $this->ids];
    }
}

readonly class StatusBatchResponse extends Model
{
    /** @param array<string, array<string, mixed>> $statuses */
    public function __construct(
        public bool $success,
        public array $statuses,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $statuses = [];
        if (isset($data['statuses']) && is_array($data['statuses'])) {
            foreach ($data['statuses'] as $id => $status) {
                if (is_string($id) && is_array($status)) {
                    $statuses[$id] = $status;
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            statuses: $statuses,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'statuses' => $this->statuses,
        ];
    }
}
