# ignite-api-client (PHP)

Official ignite API client (PHP).

Machine-facing SDK — no localized error messages. API failures throw `ApiException` with a machine-readable `code`, HTTP `status`, and raw `payload`. Map `code` to your own i18n layer.

## Requirements

- PHP 8.2+
- ext-json
- Guzzle 7

## Add dependency

From GitHub:

```json
{
  "require": {
    "ignite/api-client": "dev-main"
  },
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/ATT-IT-Cloud-Services/api-client-php.git"
    }
  ]
}
```

From the monorepo:

```json
{
  "require": {
    "ignite/api-client": "*"
  },
  "repositories": [
    {
      "type": "path",
      "url": "../public-api/php"
    }
  ]
}
```

## Quick start

```php
<?php

use Ignite\ApiClient\ClientKind;
use Ignite\ApiClient\IgniteClient;
use Ignite\ApiClient\IgniteClientConfig;
use Ignite\ApiClient\Models\LoginRequest;

$client = new IgniteClient(
    new IgniteClientConfig('https://api.example.test', clientKind: ClientKind::Api),
);

$login = $client->auth->login(new LoginRequest(
    email: 'you@example.com',
    password: 'secret',
    rememberMe: true,
));

if ($login->token !== null) {
    $client->setToken($login->token);
}

$services = $client->services->list(50);
echo count($services->services ?? $services->servers ?? []);
```

## Configuration

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `baseUrl` | `string` | required | ignite API base URL |
| `token` | `?string` | `null` | Bearer session token or API key |
| `clientKind` | `ClientKind` | `Api` | Sent as `X-Ignite-Client` header |
| `headers` | `array<string, string>` | empty | Extra headers on every request |
| `sandbox` | `bool` | `false` | Enable sandbox mode (sends `x-sandbox: true`) |
| `sandboxError` | `?string` | `null` | Force a sandbox error code (`x-sandbox-error`) |
| `sandboxStatus` | `?int` | `null` | HTTP status for a forced sandbox error (`x-sandbox-status`, default 400) |

### Client kind

Some financially sensitive endpoints (checkout, invoice payment, business fund) require `ClientKind::Desktop`. The server rejects `Mobile` clients for these actions.

### API keys

Create an API key via `$client->user->create_api_key('name')`, then pass the secret as `token`:

```php
$client = new IgniteClient(
    new IgniteClientConfig(
        'https://api.example.test',
        token: getenv('IGNITE_API_KEY') ?: null,
    ),
);
```

### Sandbox mode

For integration testing, enable `sandbox` to hit the API without a valid API key or session. The API returns randomly generated placeholder data and performs no real reads, writes, or provider calls. Force an error response with `sandboxError` (and optionally `sandboxStatus`) to exercise your error handling:

```php
$client = new IgniteClient(
    new IgniteClientConfig('https://api.example.test', sandbox: true),
);

$failing = new IgniteClient(
    new IgniteClientConfig(
        'https://api.example.test',
        sandbox: true,
        sandboxError: 'rate_limited',
        sandboxStatus: 429,
    ),
);
```

Paths are host-root on `https://api.example.test` (e.g. `/services`). Legacy `/api/*` redirects with HTTP 308; this client does not use the prefix.

## Resources

Typed helpers (models) remain on the original namespaces. Generated methods cover every public OpenAPI operation as `array` in/out.

| Namespace | Description |
|-----------|-------------|
| `auth` | Login, sessions, 2FA, OAuth, passkeys |
| `services` | VMs, containers, provider actions |
| `billing` | Invoices, subscriptions, payment methods |
| `checkout` | Cart validation, calculation, submit |
| `shop` | Product catalog |
| `dashboard` | Overview aggregates |
| `domains` | Domain list, DNS, orders |
| `subdomains` | Subdomain management |
| `ipManager` | IP manager entries |
| `sshKeys` | SSH key management |
| `support` | Tickets, knowledge base, feedback |
| `user` | Profile extras, API keys, support PIN |
| `wallet` | Auto top-up, vouchers |
| `business` | Business fund, billing |
| `affiliates` | Affiliate profile, commissions |
| `family` | Family groups, invites |
| `byoip` | BYOIP networks |
| `floatingIps` | Floating IP management |
| `team` | Teams, members, groups |
| `container` | Container projects and workloads |
| `storage` | Object storage |
| `plus` | Plus subscription |
| `permissions` | Delegated access |
| `addresses` | Account addresses |
| `publicApi` | Public catalog, abuse, reviews |
| `health` / `ping` / `openApi` | System endpoints |

## Error handling

```php
use Ignite\ApiClient\ApiException;

try {
    $result = $client->billing->pay_invoice('inv_123', $body);
} catch (ApiException $e) {
    echo "errorCode={$e->errorCode} status={$e->status}\n";
    // $e->payload contains the raw API body
}
```

## Examples

```bash
cd public-api/php

# Auth (email/password)
IGNITE_EMAIL=you@example.com IGNITE_PASSWORD=secret php examples/auth.php

# Services (token or API key)
IGNITE_TOKEN=ek_... php examples/services.php

# Checkout flow
IGNITE_TOKEN=... php examples/checkout.php

# Pay invoice
IGNITE_TOKEN=... IGNITE_INVOICE_ID=inv_... php examples/pay_invoice.php
```

## Build & test

```bash
cd public-api/php
composer install
composer test
```

## Generate from OpenAPI

The standalone PHP client is published from this repository; its source is regenerated from the public OpenAPI document.

From the repo root:

```bash
bun run docs:api
bun run sdk:php
```

`docs:api` must run first (`apps/backend/app/openapi.generated.json`). The generator keeps typed methods, rewrites them to host-root paths, and adds a method for every remaining OpenAPI operation.

## CI & releases

The client is versioned in `public-api/php` of the monorepo. Bump the base semver in `VERSION` when you want a new major/minor/patch line.

## Sync error codes

From the repo root:

```bash
node scripts/sync-php-error-codes.mjs
```

Or:

```bash
bun run sync:php-error-codes
```

## License

See [LICENSE.md](LICENSE.md). Unmodified use in your own projects is permitted; modification is not.
