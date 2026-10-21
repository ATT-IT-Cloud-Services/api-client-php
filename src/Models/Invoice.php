<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

enum InvoicePaymentMethod: string
{
    case Mollie = 'mollie';
    case MollieSaved = 'mollie_saved';
    case Guthaben = 'guthaben';
}

readonly class Invoice extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $status,
        public float $total,
        public ?string $number = null,
        public ?string $currency = null,
        public ?string $dueAt = null,
        public ?string $paidAt = null,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            status: self::string($data, 'status'),
            total: self::float($data, 'total'),
            number: self::nullableString($data, 'number'),
            currency: self::nullableString($data, 'currency'),
            dueAt: self::nullableString($data, 'dueAt'),
            paidAt: self::nullableString($data, 'paidAt'),
            extra: self::extra($data, ['id', 'number', 'status', 'total', 'currency', 'dueAt', 'paidAt']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = array_filter([
            'id' => $this->id,
            'number' => $this->number,
            'status' => $this->status,
            'total' => $this->total,
            'currency' => $this->currency,
            'dueAt' => $this->dueAt,
            'paidAt' => $this->paidAt,
        ], static fn ($v) => $v !== null);

        return array_merge($result, $this->extra);
    }
}

readonly class InvoiceListResponse extends Model
{
    /** @param list<Invoice> $invoices */
    public function __construct(
        public bool $success,
        public array $invoices,
        public ?Pagination $pagination = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $invoices = [];
        foreach ($data['invoices'] ?? [] as $item) {
            if (is_array($item)) {
                $invoices[] = Invoice::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            invoices: $invoices,
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
            'invoices' => array_map(static fn (Invoice $i): array => $i->toArray(), $this->invoices),
        ];
        if ($this->pagination !== null) {
            $result['pagination'] = $this->pagination->toArray();
        }

        return $result;
    }
}

readonly class InvoiceDetailResponse extends Model
{
    public function __construct(
        public bool $success,
        public Invoice $invoice,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            invoice: Invoice::fromArray($data['invoice']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'invoice' => $this->invoice->toArray(),
        ];
    }
}

readonly class InvoicePayBody extends Model
{
    public function __construct(
        public InvoicePaymentMethod $paymentMethod,
        public ?string $savedMandateId = null,
        public ?float $amountFromBalance = null,
        public ?float $netPointsRedeemEur = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            paymentMethod: InvoicePaymentMethod::from(self::string($data, 'paymentMethod')),
            savedMandateId: self::nullableString($data, 'savedMandateId'),
            amountFromBalance: self::nullableFloat($data, 'amountFromBalance'),
            netPointsRedeemEur: self::nullableFloat($data, 'netPointsRedeemEur'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['paymentMethod' => $this->paymentMethod->value];
        if ($this->savedMandateId !== null) {
            $result['savedMandateId'] = $this->savedMandateId;
        }
        if ($this->amountFromBalance !== null) {
            $result['amountFromBalance'] = $this->amountFromBalance;
        }
        if ($this->netPointsRedeemEur !== null) {
            $result['netPointsRedeemEur'] = $this->netPointsRedeemEur;
        }

        return $result;
    }
}

readonly class InvoicePayResult extends Model
{
    public function __construct(
        public bool $success,
        public ?bool $alreadyPaid = null,
        public ?string $paymentId = null,
        public ?string $checkoutUrl = null,
        public ?bool $processing = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            alreadyPaid: self::nullableBool($data, 'alreadyPaid'),
            paymentId: self::nullableString($data, 'paymentId'),
            checkoutUrl: self::nullableString($data, 'checkoutUrl'),
            processing: self::nullableBool($data, 'processing'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'success' => $this->success,
            'alreadyPaid' => $this->alreadyPaid,
            'paymentId' => $this->paymentId,
            'checkoutUrl' => $this->checkoutUrl,
            'processing' => $this->processing,
        ], static fn ($v) => $v !== null);
    }
}

readonly class SavedPaymentMethod extends Model
{
    public function __construct(
        public string $mandateId,
        public ?string $label = null,
        public ?string $userLabel = null,
        public ?string $method = null,
        public ?string $brand = null,
        public ?string $last4 = null,
        public ?bool $isDefault = null,
        public ?string $createdAt = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            mandateId: self::string($data, 'mandateId'),
            label: self::nullableString($data, 'label'),
            userLabel: self::nullableString($data, 'userLabel'),
            method: self::nullableString($data, 'method'),
            brand: self::nullableString($data, 'brand'),
            last4: self::nullableString($data, 'last4'),
            isDefault: self::nullableBool($data, 'isDefault'),
            createdAt: self::nullableString($data, 'createdAt'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'mandateId' => $this->mandateId,
            'label' => $this->label,
            'userLabel' => $this->userLabel,
            'method' => $this->method,
            'brand' => $this->brand,
            'last4' => $this->last4,
            'isDefault' => $this->isDefault,
            'createdAt' => $this->createdAt,
        ], static fn ($v) => $v !== null);
    }
}

readonly class PaymentMethodsResult extends Model
{
    /** @param list<SavedPaymentMethod> $methods */
    public function __construct(
        public bool $success,
        public bool $canManage,
        public array $methods,
        public ?string $defaultMandateId,
        public int $maxMethods,
        public bool $canAddMore,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $methods = [];
        foreach ($data['methods'] ?? [] as $item) {
            if (is_array($item)) {
                $methods[] = SavedPaymentMethod::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            canManage: self::bool($data, 'canManage'),
            methods: $methods,
            defaultMandateId: self::nullableString($data, 'defaultMandateId'),
            maxMethods: self::int($data, 'maxMethods'),
            canAddMore: self::bool($data, 'canAddMore'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'success' => $this->success,
            'canManage' => $this->canManage,
            'methods' => array_map(static fn (SavedPaymentMethod $m): array => $m->toArray(), $this->methods),
            'maxMethods' => $this->maxMethods,
            'canAddMore' => $this->canAddMore,
        ];
        if ($this->defaultMandateId !== null) {
            $result['defaultMandateId'] = $this->defaultMandateId;
        }

        return $result;
    }
}

readonly class Subscription extends Model
{
    /** @param array<string, mixed> $extra */
    public function __construct(
        public string $id,
        public string $status,
        public array $extra = [],
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            status: self::string($data, 'status'),
            extra: self::extra($data, ['id', 'status']),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_merge([
            'id' => $this->id,
            'status' => $this->status,
        ], $this->extra);
    }
}

readonly class SubscriptionsResponse extends Model
{
    /** @param list<Subscription> $subscriptions */
    public function __construct(
        public bool $success,
        public array $subscriptions,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $subscriptions = [];
        foreach ($data['subscriptions'] ?? [] as $item) {
            if (is_array($item)) {
                $subscriptions[] = Subscription::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            subscriptions: $subscriptions,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'subscriptions' => array_map(static fn (Subscription $s): array => $s->toArray(), $this->subscriptions),
        ];
    }
}

readonly class NetPointsPreviewRequest extends Model
{
    public function __construct(
        public float $orderTotal,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            orderTotal: self::float($data, 'orderTotal'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['orderTotal' => $this->orderTotal];
    }
}

readonly class NetPointsPreviewResponse extends Model
{
    public function __construct(
        public bool $success,
        public float $maxEur,
        public float $maxPoints,
        public float $currentBalance,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            success: self::bool($data, 'success'),
            maxEur: self::float($data, 'maxEur'),
            maxPoints: self::float($data, 'maxPoints'),
            currentBalance: self::float($data, 'currentBalance'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'maxEur' => $this->maxEur,
            'maxPoints' => $this->maxPoints,
            'currentBalance' => $this->currentBalance,
        ];
    }
}

readonly class InvoiceListFilters extends Model
{
    public function __construct(
        public ?string $status = null,
        public ?string $serviceId = null,
        public ?int $limit = null,
        public ?int $offset = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            status: self::nullableString($data, 'status'),
            serviceId: self::nullableString($data, 'serviceId'),
            limit: self::nullableInt($data, 'limit'),
            offset: self::nullableInt($data, 'offset'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'status' => $this->status,
            'serviceId' => $this->serviceId,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ], static fn ($v) => $v !== null);
    }
}

readonly class AddPaymentMethodResponse extends Model
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

readonly class SetDefaultPaymentMethodRequest extends Model
{
    public function __construct(
        public string $mandateId,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            mandateId: self::string($data, 'mandateId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['mandateId' => $this->mandateId];
    }
}

readonly class UpdatePaymentMethodLabelRequest extends Model
{
    public function __construct(
        public string $mandateId,
        public string $userLabel,
        public ?bool $setDefault = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            mandateId: self::string($data, 'mandateId'),
            userLabel: self::string($data, 'userLabel'),
            setDefault: self::nullableBool($data, 'setDefault'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'mandateId' => $this->mandateId,
            'userLabel' => $this->userLabel,
        ];
        if ($this->setDefault !== null) {
            $result['setDefault'] = $this->setDefault;
        }

        return $result;
    }
}
