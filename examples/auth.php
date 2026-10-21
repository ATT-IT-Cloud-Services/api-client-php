<?php

declare(strict_types=1);

/**
 * Authentication example for ignite-api-client
 *
 * Run: php examples/auth.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\ClientKind;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\Models\LoginRequest;

$baseUrl = getenv('IGNITE_API_URL') ?: 'https://api.example.test';

$email = getenv('IGNITE_EMAIL');
$password = getenv('IGNITE_PASSWORD');

if ($email === false || $email === '' || $password === false || $password === '') {
    fwrite(STDERR, "Set IGNITE_EMAIL and IGNITE_PASSWORD environment variables.\n");
    exit(1);
}

$client = new IgniteClient(
    new IgniteClientConfig($baseUrl, clientKind: ClientKind::Api),
);

try {
    $login = $client->auth->login(new LoginRequest(
        email: $email,
        password: $password,
        rememberMe: true,
    ));

    if ($login->requiresTwoFactor === true) {
        echo "Two-factor authentication required.\n";
        exit(0);
    }

    if ($login->token !== null) {
        $client->setToken($login->token);
    }

    $me = $client->auth->me();
    echo 'Authenticated user: ' . $me->user->id . ' ' . $me->user->email . "\n";

    $sessions = $client->auth->sessions();
    echo 'Active sessions: ' . count($sessions->sessions) . "\n";
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->errorCode . ' ' . $e->status . "\n");
    exit(1);
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . "\n");
    exit(1);
}
