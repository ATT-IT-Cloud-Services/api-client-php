<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

readonly class Ticket extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $subject,
        public string $status,
        public string $priority,
        public ?string $createdAt = null,
        public ?string $updatedAt = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            subject: self::string($data, 'subject'),
            status: self::string($data, 'status'),
            priority: self::string($data, 'priority'),
            createdAt: self::nullableString($data, 'createdAt'),
            updatedAt: self::nullableString($data, 'updatedAt'),
            extra: self::extra($data, ['id', 'subject', 'status', 'priority', 'createdAt', 'updatedAt']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'subject' => $this->subject,
            'status' => $this->status,
            'priority' => $this->priority,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class TicketListResponse extends Model
{
    /** @param list<Ticket> $tickets @param array<string, mixed>|null $stats */
    public function __construct(
        public bool $success,
        public array $tickets,
        public ?array $stats = null,
        public ?Pagination $pagination = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $tickets = [];
        foreach ($data['tickets'] ?? [] as $item) {
            if (is_array($item)) {
                $tickets[] = Ticket::fromArray($item);
            }
        }
        $stats = null;
        if (isset($data['stats']) && is_array($data['stats'])) {
            $stats = $data['stats'];
        }

        return new self(
            success: self::bool($data, 'success'),
            tickets: $tickets,
            stats: $stats,
            pagination: isset($data['pagination']) && is_array($data['pagination'])
                ? Pagination::fromArray($data['pagination'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'success' => $this->success,
            'tickets' => array_map(static fn (Ticket $t): array => $t->toArray(), $this->tickets),
        ];
        if ($this->stats !== null) {
            $result['stats'] = $this->stats;
        }
        if ($this->pagination !== null) {
            $result['pagination'] = $this->pagination->toArray();
        }

        return $result;
    }
}

readonly class TicketDetailResponse extends Model
{
    public function __construct(
        public bool $success,
        public Ticket $ticket,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            ticket: Ticket::fromArray($data['ticket']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'ticket' => $this->ticket->toArray(),
        ];
    }
}

readonly class KnowledgeBaseArticle extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $title,
        public ?string $slug = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            title: self::string($data, 'title'),
            slug: self::nullableString($data, 'slug'),
            extra: self::extra($data, ['id', 'title', 'slug']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'id' => $this->id,
            'title' => $this->title,
        ];
        if ($this->slug !== null) {
            $result['slug'] = $this->slug;
        }

        return array_merge($result, $this->extra);
    }
}

readonly class KnowledgeBaseResponse extends Model
{
    /** @param list<KnowledgeBaseArticle> $articles */
    public function __construct(
        public bool $success,
        public array $articles,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $articles = [];
        foreach ($data['articles'] ?? [] as $item) {
            if (is_array($item)) {
                $articles[] = KnowledgeBaseArticle::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            articles: $articles,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'articles' => array_map(static fn (KnowledgeBaseArticle $a): array => $a->toArray(), $this->articles),
        ];
    }
}

readonly class CreateTicketRequest extends Model
{
    public function __construct(
        public string $subject,
        public string $message,
        public string $priority,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            subject: self::string($data, 'subject'),
            message: self::string($data, 'message'),
            priority: self::string($data, 'priority'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'subject' => $this->subject,
            'message' => $this->message,
            'priority' => $this->priority,
        ];
    }
}

readonly class CreateTicketResponse extends Model
{
    public function __construct(
        public bool $success,
        public mixed $ticket = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            ticket: $data['ticket'] ?? null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->ticket !== null) {
            $result['ticket'] = $this->ticket;
        }

        return $result;
    }
}

readonly class ReplyTicketRequest extends Model
{
    public function __construct(
        public string $content,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            content: self::string($data, 'content'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['content' => $this->content];
    }
}

readonly class DashboardTicketsResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?Pagination $pagination = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            pagination: isset($data['pagination']) && is_array($data['pagination'])
                ? Pagination::fromArray($data['pagination'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->pagination !== null) {
            $result['pagination'] = $this->pagination->toArray();
        }

        return $result;
    }
}

readonly class TotalBandwidthUsage extends Model
{
    public function __construct(
        public ?float $totalGb = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            totalGb: self::nullableFloat($data, 'totalGb'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [];
        if ($this->totalGb !== null) {
            $result['totalGb'] = $this->totalGb;
        }

        return $result;
    }
}

readonly class TotalBandwidthResponse extends Model
{
    public function __construct(
        public bool $success,
        public ?TotalBandwidthUsage $usage = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            usage: isset($data['usage']) && is_array($data['usage'])
                ? TotalBandwidthUsage::fromArray($data['usage'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->usage !== null) {
            $result['usage'] = $this->usage->toArray();
        }

        return $result;
    }
}

readonly class MaintenanceNotificationsResponse extends Model
{
    /** @param list<array<string, mixed>>|null $notifications */
    public function __construct(
        public bool $success,
        public ?array $notifications = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $notifications = null;
        if (isset($data['notifications']) && is_array($data['notifications'])) {
            $notifications = [];
            foreach ($data['notifications'] as $item) {
                if (is_array($item)) {
                    $notifications[] = $item;
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            notifications: $notifications,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->notifications !== null) {
            $result['notifications'] = $this->notifications;
        }

        return $result;
    }
}

readonly class ServiceSourceCounts extends Model
{
    public function __construct(
        public int $service,
        public int $pool,
        public int $wallet,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            service: self::int($data, 'SERVICE'),
            pool: self::int($data, 'POOL'),
            wallet: self::int($data, 'WALLET'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'SERVICE' => $this->service,
            'POOL' => $this->pool,
            'WALLET' => $this->wallet,
        ];
    }
}

readonly class TrafficSourcesSummary extends Model
{
    public function __construct(
        public float $walletBalanceTb,
        public float $walletUsedTb,
        public ServiceSourceCounts $serviceSourceCounts,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            walletBalanceTb: self::float($data, 'walletBalanceTb'),
            walletUsedTb: self::float($data, 'walletUsedTb'),
            serviceSourceCounts: ServiceSourceCounts::fromArray($data['serviceSourceCounts']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'walletBalanceTb' => $this->walletBalanceTb,
            'walletUsedTb' => $this->walletUsedTb,
            'serviceSourceCounts' => $this->serviceSourceCounts->toArray(),
        ];
    }
}

readonly class TrafficSourcesResponse extends Model
{
    /** @param list<mixed>|null $serviceSources */
    public function __construct(
        public bool $success,
        public ?TrafficSourcesSummary $summary = null,
        public ?array $serviceSources = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $serviceSources = null;
        if (isset($data['serviceSources']) && is_array($data['serviceSources'])) {
            $serviceSources = array_values($data['serviceSources']);
        }

        return new self(
            success: self::bool($data, 'success'),
            summary: isset($data['summary']) && is_array($data['summary'])
                ? TrafficSourcesSummary::fromArray($data['summary'])
                : null,
            serviceSources: $serviceSources,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->summary !== null) {
            $result['summary'] = $this->summary->toArray();
        }
        if ($this->serviceSources !== null) {
            $result['serviceSources'] = $this->serviceSources;
        }

        return $result;
    }
}

readonly class MonthlyOffersResponse extends Model
{
    /** @param list<mixed>|null $offers */
    public function __construct(
        public bool $success,
        public ?array $offers = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $offers = null;
        if (isset($data['offers']) && is_array($data['offers'])) {
            $offers = array_values($data['offers']);
        }

        return new self(
            success: self::bool($data, 'success'),
            offers: $offers,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->offers !== null) {
            $result['offers'] = $this->offers;
        }

        return $result;
    }
}
