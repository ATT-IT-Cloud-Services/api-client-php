# Internationalization Policy — ignite API client (PHP)

This client is a **machine-facing SDK**, not a UI layer. Human-readable text belongs in consuming applications (web panel, mobile app, CLI with i18n), not in this package.

## Runtime code (enforced)

- **MUST NOT** return German, English, or any other localized user messages from functions, errors, or response wrappers.
- **MUST** surface API failures as:
  - `errorCode` strings (camelCase, matching `packages/server/src/api/error-codes.ts` on the server)
  - HTTP status codes and structured response bodies unchanged from the API
- **MUST NOT** hardcode UI strings, toast text, labels, or fallback sentences in `.php` source files under `src/`.
- Boolean flags, numbers, enums, and opaque identifiers are allowed in return values.

## Documentation (English only)

- `README.md` — setup, usage, examples (English)
- Error codes are synced from `packages/server/src/api/error-codes.generated.ts` via `scripts/sync-php-error-codes.mjs`

## Consumer responsibility

Applications that show errors to end users **must** map `ApiException->errorCode` → localized message. This client only transports codes.

## Review checklist before merge

- [ ] No string literals that read like user-facing sentences in `src/**/*.php`
- [ ] Errors use `code` from the API payload, not localized `message` fields invented by the client
- [ ] README is English
- [ ] Tests assert on `code`, not on German/English message text
