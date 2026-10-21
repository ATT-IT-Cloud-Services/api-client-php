<?php

declare(strict_types=1);

/**
 * Sandbox mode example for ignite-api-client
 *
 * Run: php examples/sandbox.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;

$baseUrl = getenv('IGNITE_API_URL') ?: 'https://api.example.test';

// Sandbox mode needs no API key or session token.
$client = new IgniteClient(
    new IgniteClientConfig($baseUrl, sandbox: true),
);

try {
    $list = $client->services->list(20);
    $items = $list->services ?? $list->servers ?? [];
    echo 'Sandbox services: ' . count($items) . "\n";
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->errorCode . ' ' . $e->status . "\n");
    exit(1);
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . "\n");
    exit(1);
}

// Force a specific sandbox error to test error handling.
$failing = new IgniteClient(
    new IgniteClientConfig(
        $baseUrl,
        sandbox: true,
        sandboxError: 'rate_limited',
        sandboxStatus: 429,
    ),
);

try {
    $failing->services->list();
    fwrite(STDERR, "Expected a sandbox error, but the request succeeded.\n");
    exit(1);
} catch (ApiException $e) {
    echo 'Forced sandbox error: ' . $e->errorCode . ' ' . $e->status . "\n";
}
