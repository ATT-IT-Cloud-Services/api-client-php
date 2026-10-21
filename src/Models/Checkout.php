<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Models;

enum CheckoutPaymentMethod: string
{
    case Mollie = 'mollie';
    case MollieSaved = 'mollie_saved';
    case Sepa = 'sepa';
    case Guthaben = 'guthaben';
    case Invoice = 'invoice';
    case Businessfund = 'businessfund';
    case FamilyWallet = 'family_wallet';
}

readonly class CheckoutAddress extends Model
{
    public function __construct(
        public string $id,
        public string $street,
        public string $zip,
        public string $city,
        public string $countryCode,
        public string $country,
        public ?string $label = null,
        public ?string $companyName = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $phone = null,
        public ?string $vatId = null,
        public ?bool $isDefault = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            id: self::string($data, 'id'),
            street: self::string($data, 'street'),
            zip: self::string($data, 'zip'),
            city: self::string($data, 'city'),
            countryCode: self::string($data, 'countryCode'),
            country: self::string($data, 'country'),
            label: self::nullableString($data, 'label'),
            companyName: self::nullableString($data, 'companyName'),
            firstName: self::nullableString($data, 'firstName'),
            lastName: self::nullableString($data, 'lastName'),
            phone: self::nullableString($data, 'phone'),
            vatId: self::nullableString($data, 'vatId'),
            isDefault: self::nullableBool($data, 'isDefault'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'id' => $this->id,
            'label' => $this->label,
            'companyName' => $this->companyName,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'street' => $this->street,
            'zip' => $this->zip,
            'city' => $this->city,
            'countryCode' => $this->countryCode,
            'country' => $this->country,
            'phone' => $this->phone,
            'vatId' => $this->vatId,
            'isDefault' => $this->isDefault,
        ], static fn ($v) => $v !== null);
    }
}

readonly class NetPointsBalance extends Model
{
    public function __construct(
        public float $points,
        public float $eurValue,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            points: self::float($data, 'points'),
            eurValue: self::float($data, 'eurValue'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'points' => $this->points,
            'eurValue' => $this->eurValue,
        ];
    }
}

readonly class BusinessBillingConfig extends Model
{
    public function __construct(
        public bool $invoiceEnabled,
        public bool $hasActiveFund,
        public ?int $anchorDay = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            invoiceEnabled: self::bool($data, 'invoiceEnabled'),
            hasActiveFund: self::bool($data, 'hasActiveFund'),
            anchorDay: self::nullableInt($data, 'anchorDay'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'invoiceEnabled' => $this->invoiceEnabled,
            'hasActiveFund' => $this->hasActiveFund,
        ];
        if ($this->anchorDay !== null) {
            $result['anchorDay'] = $this->anchorDay;
        }

        return $result;
    }
}

readonly class FamilyBillingConfig extends Model
{
    public function __construct(
        public string $groupId,
        public float $walletBalance,
        public ?string $billingMode = null,
        public ?string $billingPriority = null,
        public ?bool $requirePaymentApproval = null,
        public ?bool $sharedBalance = null,
        public ?string $userRole = null,
        public ?string $userBillingMode = null,
        public ?bool $accountLocked = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            groupId: self::string($data, 'groupId'),
            walletBalance: self::float($data, 'walletBalance'),
            billingMode: self::nullableString($data, 'billingMode'),
            billingPriority: self::nullableString($data, 'billingPriority'),
            requirePaymentApproval: self::nullableBool($data, 'requirePaymentApproval'),
            sharedBalance: self::nullableBool($data, 'sharedBalance'),
            userRole: self::nullableString($data, 'userRole'),
            userBillingMode: self::nullableString($data, 'userBillingMode'),
            accountLocked: self::nullableBool($data, 'accountLocked'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'groupId' => $this->groupId,
            'walletBalance' => $this->walletBalance,
            'billingMode' => $this->billingMode,
            'billingPriority' => $this->billingPriority,
            'requirePaymentApproval' => $this->requirePaymentApproval,
            'sharedBalance' => $this->sharedBalance,
            'userRole' => $this->userRole,
            'userBillingMode' => $this->userBillingMode,
            'accountLocked' => $this->accountLocked,
        ], static fn ($v) => $v !== null);
    }
}

readonly class SavedPaymentMethodsSummary extends Model
{
    public function __construct(
        public bool $hasValid,
        public ?string $defaultLabel = null,
        public ?string $defaultMandateId = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            hasValid: self::bool($data, 'hasValid'),
            defaultLabel: self::nullableString($data, 'defaultLabel'),
            defaultMandateId: self::nullableString($data, 'defaultMandateId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['hasValid' => $this->hasValid];
        if ($this->defaultLabel !== null) {
            $result['defaultLabel'] = $this->defaultLabel;
        }
        if ($this->defaultMandateId !== null) {
            $result['defaultMandateId'] = $this->defaultMandateId;
        }

        return $result;
    }
}

readonly class CheckoutBootstrap extends Model
{
    /** @param list<CheckoutAddress> $addresses @param list<Country> $countries */
    public function __construct(
        public bool $success,
        public array $addresses,
        public array $countries,
        public ?NetPointsBalance $netPointsBalance = null,
        public ?BusinessBillingConfig $businessBillingConfig = null,
        public ?FamilyBillingConfig $familyBillingConfig = null,
        public ?SavedPaymentMethodsSummary $savedPaymentMethods = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $addresses = [];
        foreach ($data['addresses'] ?? [] as $item) {
            if (is_array($item)) {
                $addresses[] = CheckoutAddress::fromArray($item);
            }
        }
        $countries = [];
        foreach ($data['countries'] ?? [] as $item) {
            if (is_array($item)) {
                $countries[] = Country::fromArray($item);
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            addresses: $addresses,
            countries: $countries,
            netPointsBalance: isset($data['netPointsBalance']) && is_array($data['netPointsBalance'])
                ? NetPointsBalance::fromArray($data['netPointsBalance'])
                : null,
            businessBillingConfig: isset($data['businessBillingConfig']) && is_array($data['businessBillingConfig'])
                ? BusinessBillingConfig::fromArray($data['businessBillingConfig'])
                : null,
            familyBillingConfig: isset($data['familyBillingConfig']) && is_array($data['familyBillingConfig'])
                ? FamilyBillingConfig::fromArray($data['familyBillingConfig'])
                : null,
            savedPaymentMethods: isset($data['savedPaymentMethods']) && is_array($data['savedPaymentMethods'])
                ? SavedPaymentMethodsSummary::fromArray($data['savedPaymentMethods'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'success' => $this->success,
            'addresses' => array_map(static fn (CheckoutAddress $a): array => $a->toArray(), $this->addresses),
            'countries' => array_map(static fn (Country $c): array => $c->toArray(), $this->countries),
        ];
        if ($this->netPointsBalance !== null) {
            $result['netPointsBalance'] = $this->netPointsBalance->toArray();
        }
        if ($this->businessBillingConfig !== null) {
            $result['businessBillingConfig'] = $this->businessBillingConfig->toArray();
        }
        if ($this->familyBillingConfig !== null) {
            $result['familyBillingConfig'] = $this->familyBillingConfig->toArray();
        }
        if ($this->savedPaymentMethods !== null) {
            $result['savedPaymentMethods'] = $this->savedPaymentMethods->toArray();
        }

        return $result;
    }
}

readonly class CheckoutCartLineCustomization extends Model
{
    public function __construct(
        public ?int $vcores = null,
        public ?int $memory = null,
        public ?int $storage = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            vcores: self::nullableInt($data, 'vcores'),
            memory: self::nullableInt($data, 'memory'),
            storage: self::nullableInt($data, 'storage'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'vcores' => $this->vcores,
            'memory' => $this->memory,
            'storage' => $this->storage,
        ], static fn ($v) => $v !== null);
    }
}

readonly class CheckoutCartLine extends Model
{
    public function __construct(
        public string $lineId,
        public string $productId,
        public string $productName,
        public int $quantity,
        public int $billingCycle,
        public string $itemType,
        public ?CheckoutCartLineCustomization $customization = null,
        public ?string $locationId = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            lineId: self::string($data, 'lineId'),
            productId: self::string($data, 'productId'),
            productName: self::string($data, 'productName'),
            quantity: self::int($data, 'quantity'),
            billingCycle: self::int($data, 'billingCycle'),
            itemType: self::string($data, 'itemType'),
            customization: isset($data['customization']) && is_array($data['customization'])
                ? CheckoutCartLineCustomization::fromArray($data['customization'])
                : null,
            locationId: self::nullableString($data, 'locationId'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'lineId' => $this->lineId,
            'productId' => $this->productId,
            'productName' => $this->productName,
            'quantity' => $this->quantity,
            'billingCycle' => $this->billingCycle,
            'itemType' => $this->itemType,
        ];
        if ($this->customization !== null) {
            $result['customization'] = $this->customization->toArray();
        }
        if ($this->locationId !== null) {
            $result['locationId'] = $this->locationId;
        }

        return $result;
    }
}

readonly class CartUnavailableItem extends Model
{
    public function __construct(
        public string $lineId,
        public string $productName,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            lineId: self::string($data, 'lineId'),
            productName: self::string($data, 'productName'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return [
            'lineId' => $this->lineId,
            'productName' => $this->productName,
        ];
    }
}

readonly class CartValidateResponse extends Model
{
    /** @param list<CartUnavailableItem>|null $unavailable */
    public function __construct(
        public bool $success,
        public ?array $unavailable = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $unavailable = null;
        if (isset($data['unavailable']) && is_array($data['unavailable'])) {
            $unavailable = [];
            foreach ($data['unavailable'] as $item) {
                if (is_array($item)) {
                    $unavailable[] = CartUnavailableItem::fromArray($item);
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            unavailable: $unavailable,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->unavailable !== null) {
            $result['unavailable'] = array_map(
                static fn (CartUnavailableItem $i): array => $i->toArray(),
                $this->unavailable,
            );
        }

        return $result;
    }
}

readonly class CalculatePayload extends Model
{
    /** @param list<array<string, mixed>> $items */
    public function __construct(
        public array $items,
        public ?string $countryCode = null,
        public ?bool $hasVatId = null,
        public ?string $vatNumber = null,
        public ?string $lang = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $items = [];
        foreach ($data['items'] ?? [] as $item) {
            if (is_array($item)) {
                $items[] = $item;
            }
        }

        return new self(
            items: $items,
            countryCode: self::nullableString($data, 'countryCode'),
            hasVatId: self::nullableBool($data, 'hasVatId'),
            vatNumber: self::nullableString($data, 'vatNumber'),
            lang: self::nullableString($data, 'lang'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['items' => $this->items];
        if ($this->countryCode !== null) {
            $result['countryCode'] = $this->countryCode;
        }
        if ($this->hasVatId !== null) {
            $result['hasVatId'] = $this->hasVatId;
        }
        if ($this->vatNumber !== null) {
            $result['vatNumber'] = $this->vatNumber;
        }
        if ($this->lang !== null) {
            $result['lang'] = $this->lang;
        }

        return $result;
    }
}

readonly class CartCalculateItem extends Model
{
    public function __construct(
        public string $productId,
        public string $productName,
        public float $total,
        public ?int $quantity = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            productId: self::string($data, 'productId'),
            productName: self::string($data, 'productName'),
            total: self::float($data, 'total'),
            quantity: self::nullableInt($data, 'quantity'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'productId' => $this->productId,
            'productName' => $this->productName,
            'total' => $this->total,
        ];
        if ($this->quantity !== null) {
            $result['quantity'] = $this->quantity;
        }

        return $result;
    }
}

readonly class CartCalculateResponse extends Model
{
    /** @param list<CartCalculateItem>|null $items */
    public function __construct(
        public bool $success,
        public ?array $items = null,
        public ?float $subtotal = null,
        public ?float $tax = null,
        public ?float $total = null,
        public ?float $firstMonthAmount = null,
        public ?string $taxName = null,
        public ?float $taxRatePercent = null,
        public ?bool $isVatFree = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $items = null;
        if (isset($data['items']) && is_array($data['items'])) {
            $items = [];
            foreach ($data['items'] as $item) {
                if (is_array($item)) {
                    $items[] = CartCalculateItem::fromArray($item);
                }
            }
        }

        return new self(
            success: self::bool($data, 'success'),
            items: $items,
            subtotal: self::nullableFloat($data, 'subtotal'),
            tax: self::nullableFloat($data, 'tax'),
            total: self::nullableFloat($data, 'total'),
            firstMonthAmount: self::nullableFloat($data, 'firstMonthAmount'),
            taxName: self::nullableString($data, 'taxName'),
            taxRatePercent: self::nullableFloat($data, 'taxRatePercent'),
            isVatFree: self::nullableBool($data, 'isVatFree'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->items !== null) {
            $result['items'] = array_map(static fn (CartCalculateItem $i): array => $i->toArray(), $this->items);
        }
        if ($this->subtotal !== null) {
            $result['subtotal'] = $this->subtotal;
        }
        if ($this->tax !== null) {
            $result['tax'] = $this->tax;
        }
        if ($this->total !== null) {
            $result['total'] = $this->total;
        }
        if ($this->firstMonthAmount !== null) {
            $result['firstMonthAmount'] = $this->firstMonthAmount;
        }
        if ($this->taxName !== null) {
            $result['taxName'] = $this->taxName;
        }
        if ($this->taxRatePercent !== null) {
            $result['taxRatePercent'] = $this->taxRatePercent;
        }
        if ($this->isVatFree !== null) {
            $result['isVatFree'] = $this->isVatFree;
        }

        return $result;
    }
}

readonly class CheckoutBillingAddressInput extends Model
{
    public function __construct(
        public string $street,
        public string $zip,
        public string $city,
        public string $countryCode,
        public string $country,
        public ?string $label = null,
        public ?string $companyName = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $phone = null,
        public ?string $vatId = null,
        public ?bool $isDefault = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            street: self::string($data, 'street'),
            zip: self::string($data, 'zip'),
            city: self::string($data, 'city'),
            countryCode: self::string($data, 'countryCode'),
            country: self::string($data, 'country'),
            label: self::nullableString($data, 'label'),
            companyName: self::nullableString($data, 'companyName'),
            firstName: self::nullableString($data, 'firstName'),
            lastName: self::nullableString($data, 'lastName'),
            phone: self::nullableString($data, 'phone'),
            vatId: self::nullableString($data, 'vatId'),
            isDefault: self::nullableBool($data, 'isDefault'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return array_filter([
            'label' => $this->label,
            'companyName' => $this->companyName,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'street' => $this->street,
            'zip' => $this->zip,
            'city' => $this->city,
            'countryCode' => $this->countryCode,
            'country' => $this->country,
            'phone' => $this->phone,
            'vatId' => $this->vatId,
            'isDefault' => $this->isDefault,
        ], static fn ($v) => $v !== null);
    }
}

readonly class CheckoutSubmitPayload extends Model
{
    /** @param list<array<string, mixed>> $items */
    public function __construct(
        public array $items,
        public CheckoutPaymentMethod $paymentMethod,
        public ?string $savedMandateId = null,
        public ?string $couponCode = null,
        public ?string $affiliateCode = null,
        public ?float $netPointsRedeemEur = null,
        public ?string $billingAddressId = null,
        public ?CheckoutBillingAddressInput $billingAddress = null,
        public ?bool $newsletterOptIn = null,
        public ?string $lang = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $items = [];
        foreach ($data['items'] ?? [] as $item) {
            if (is_array($item)) {
                $items[] = $item;
            }
        }

        return new self(
            items: $items,
            paymentMethod: CheckoutPaymentMethod::from(self::string($data, 'paymentMethod')),
            savedMandateId: self::nullableString($data, 'savedMandateId'),
            couponCode: self::nullableString($data, 'couponCode'),
            affiliateCode: self::nullableString($data, 'affiliateCode'),
            netPointsRedeemEur: self::nullableFloat($data, 'netPointsRedeemEur'),
            billingAddressId: self::nullableString($data, 'billingAddressId'),
            billingAddress: isset($data['billingAddress']) && is_array($data['billingAddress'])
                ? CheckoutBillingAddressInput::fromArray($data['billingAddress'])
                : null,
            newsletterOptIn: self::nullableBool($data, 'newsletterOptIn'),
            lang: self::nullableString($data, 'lang'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'items' => $this->items,
            'paymentMethod' => $this->paymentMethod->value,
        ];
        if ($this->savedMandateId !== null) {
            $result['savedMandateId'] = $this->savedMandateId;
        }
        if ($this->couponCode !== null) {
            $result['couponCode'] = $this->couponCode;
        }
        if ($this->affiliateCode !== null) {
            $result['affiliateCode'] = $this->affiliateCode;
        }
        if ($this->netPointsRedeemEur !== null) {
            $result['netPointsRedeemEur'] = $this->netPointsRedeemEur;
        }
        if ($this->billingAddressId !== null) {
            $result['billingAddressId'] = $this->billingAddressId;
        }
        if ($this->billingAddress !== null) {
            $result['billingAddress'] = $this->billingAddress->toArray();
        }
        if ($this->newsletterOptIn !== null) {
            $result['newsletterOptIn'] = $this->newsletterOptIn;
        }
        if ($this->lang !== null) {
            $result['lang'] = $this->lang;
        }

        return $result;
    }
}

readonly class SepaDetails extends Model
{
    public function __construct(
        public string $iban,
        public string $bic,
        public float $amount,
        public string $reference,
        public ?string $bankName = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        return new self(
            iban: self::string($data, 'iban'),
            bic: self::string($data, 'bic'),
            amount: self::float($data, 'amount'),
            reference: self::string($data, 'reference'),
            bankName: self::nullableString($data, 'bankName'),
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = [
            'iban' => $this->iban,
            'bic' => $this->bic,
            'amount' => $this->amount,
            'reference' => $this->reference,
        ];
        if ($this->bankName !== null) {
            $result['bankName'] = $this->bankName;
        }

        return $result;
    }
}

readonly class CheckoutSubmitResponse extends Model
{
    /** @param list<string>|null $subscriptionIds */
    public function __construct(
        public bool $success,
        public ?array $subscriptionIds = null,
        public ?string $invoiceId = null,
        public ?string $redirectUrl = null,
        public ?bool $processing = null,
        public ?string $orderId = null,
        public ?SepaDetails $sepaDetails = null,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $subscriptionIds = null;
        if (isset($data['subscriptionIds']) && is_array($data['subscriptionIds'])) {
            $subscriptionIds = array_values(array_map('strval', $data['subscriptionIds']));
        }

        return new self(
            success: self::bool($data, 'success'),
            subscriptionIds: $subscriptionIds,
            invoiceId: self::nullableString($data, 'invoiceId'),
            redirectUrl: self::nullableString($data, 'redirectUrl'),
            processing: self::nullableBool($data, 'processing'),
            orderId: self::nullableString($data, 'orderId'),
            sepaDetails: isset($data['sepaDetails']) && is_array($data['sepaDetails'])
                ? SepaDetails::fromArray($data['sepaDetails'])
                : null,
        );
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        $result = ['success' => $this->success];
        if ($this->subscriptionIds !== null) {
            $result['subscriptionIds'] = $this->subscriptionIds;
        }
        if ($this->invoiceId !== null) {
            $result['invoiceId'] = $this->invoiceId;
        }
        if ($this->redirectUrl !== null) {
            $result['redirectUrl'] = $this->redirectUrl;
        }
        if ($this->processing !== null) {
            $result['processing'] = $this->processing;
        }
        if ($this->orderId !== null) {
            $result['orderId'] = $this->orderId;
        }
        if ($this->sepaDetails !== null) {
            $result['sepaDetails'] = $this->sepaDetails->toArray();
        }

        return $result;
    }
}

readonly class CartValidateRequest extends Model
{
    /** @param list<array<string, mixed>> $items */
    public function __construct(
        public array $items,
    ) {
    }

    /** @param array<string, mixed> $data */
    public static function fromArray(array $data): static
    {
        $items = [];
        foreach ($data['items'] ?? [] as $item) {
            if (is_array($item)) {
                $items[] = $item;
            }
        }

        return new self(items: $items);
    }

    /** @return array<string, mixed> */
    public function toArray(): array
    {
        return ['items' => $this->items];
    }
}
