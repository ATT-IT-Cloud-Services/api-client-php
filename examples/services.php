<?php

declare(strict_types=1);

/**
 * Services example for ignite-api-client
 *
 * Run: php examples/services.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\ClientKind;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;

$baseUrl = getenv('IGNITE_API_URL') ?: 'https://api.example.test';

$token = getenv('IGNITE_TOKEN');
if ($token === false || $token === '') {
    fwrite(STDERR, "Set IGNITE_TOKEN (session token or API key).\n");
    exit(1);
}

$client = new IgniteClient(
    new IgniteClientConfig($baseUrl, token: $token, clientKind: ClientKind::Api),
);

try {
    $list = $client->services->list(20);
    $items = $list->services ?? $list->servers ?? [];
    echo 'Services: ' . count($items) . "\n";

    if ($items !== []) {
        $first = $items[0];
        $detail = $client->services->find($first->id);
        $name = $detail->server?->name ?? 'unknown';
        echo 'First service: ' . $name . "\n";

        $ids = array_map(static fn ($s) => $s->id, array_slice($items, 0, 5));
        $statuses = $client->services->status_batch($ids);
        echo 'Status batch keys: ' . count($statuses->statuses) . "\n";
    }
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->errorCode . ' ' . $e->status . "\n");
    exit(1);
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . "\n");
    exit(1);
}
