<?php

declare(strict_types=1);

/**
 * Checkout example for ignite-api-client
 *
 * Run: php examples/checkout.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\ClientKind;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\Models\CalculatePayload;
use Ignite\ApiClient\Models\CartValidateRequest;

$baseUrl = getenv('IGNITE_API_URL') ?: 'https://api.example.test';

$token = getenv('IGNITE_TOKEN');
if ($token === false || $token === '') {
    fwrite(STDERR, "Set IGNITE_TOKEN (session token or API key).\n");
    exit(1);
}

$client = new IgniteClient(
    new IgniteClientConfig($baseUrl, token: $token, clientKind: ClientKind::Desktop),
);

try {
    $bootstrap = $client->checkout->bootstrap();
    echo 'Addresses: ' . count($bootstrap->addresses) . "\n";
    echo 'Countries: ' . count($bootstrap->countries) . "\n";

    $catalog = $client->shop->products('en');
    $categoryCount = $catalog->categories !== null ? count($catalog->categories) : 0;
    echo 'Product categories: ' . $categoryCount . "\n";

    $productId = getenv('IGNITE_PRODUCT_ID') ?: 'example-product-id';

    $item = [
        'lineId' => 'line-1',
        'productId' => $productId,
        'productName' => 'Example Product',
        'quantity' => 1,
        'billingCycle' => 30,
        'itemType' => 'new',
    ];

    $validation = $client->checkout->validate(new CartValidateRequest([$item]));
    $unavailableCount = $validation->unavailable !== null ? count($validation->unavailable) : 0;
    echo 'Cart valid: ' . ($validation->success ? 'true' : 'false') . ' ' . $unavailableCount . " unavailable\n";

    $countryCode = $bootstrap->addresses[0]->countryCode ?? 'DE';

    $calculation = $client->checkout->calculate(new CalculatePayload(
        items: [$item],
        countryCode: $countryCode,
    ));
    echo 'Calculated total: ' . ($calculation->total ?? 'null') . "\n";
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->errorCode . ' ' . $e->status . "\n");
    exit(1);
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . "\n");
    exit(1);
}
