<?php

declare(strict_types=1);

/**
 * Pay invoice example for ignite-api-client
 *
 * Run: php examples/pay_invoice.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\ClientKind;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\Models\InvoicePayBody;
use Ignite\ApiClient\Models\InvoicePaymentMethod;

$baseUrl = getenv('IGNITE_API_URL') ?: 'https://api.example.test';

$token = getenv('IGNITE_TOKEN');
$invoiceId = getenv('IGNITE_INVOICE_ID');

if ($token === false || $token === '' || $invoiceId === false || $invoiceId === '') {
    fwrite(STDERR, "Set IGNITE_TOKEN and IGNITE_INVOICE_ID environment variables.\n");
    exit(1);
}

$client = new IgniteClient(
    new IgniteClientConfig($baseUrl, token: $token, clientKind: ClientKind::Desktop),
);

try {
    $detail = $client->billing->invoice($invoiceId);
    echo 'Invoice: ' . $detail->invoice->id . ' ' . $detail->invoice->status . ' ' . $detail->invoice->total . "\n";

    $methods = $client->billing->payment_methods();
    echo 'Saved payment methods: ' . count($methods->methods) . "\n";

    $paymentMethod = $methods->methods === []
        ? InvoicePaymentMethod::Mollie
        : InvoicePaymentMethod::MollieSaved;

    $result = $client->billing->pay_invoice($invoiceId, new InvoicePayBody(
        paymentMethod: $paymentMethod,
        savedMandateId: $methods->defaultMandateId,
    ));

    if ($result->checkoutUrl !== null) {
        echo 'Redirect to payment: ' . $result->checkoutUrl . "\n";
    } elseif ($result->alreadyPaid === true) {
        echo "Invoice already paid.\n";
    } else {
        echo 'Payment initiated: ' . ($result->paymentId ?? 'processing') . "\n";
    }
} catch (ApiException $e) {
    fwrite(STDERR, 'API error: ' . $e->errorCode . ' ' . $e->status . "\n");
    if ($e->errorCode === 'insufficientBalance') {
        fwrite(STDERR, "Top up wallet balance or choose a different payment method.\n");
    }
    exit(1);
} catch (Throwable $e) {
    fwrite(STDERR, 'Error: ' . $e->getMessage() . "\n");
    exit(1);
}
