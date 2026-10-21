<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\ChangePasswordRequest;
use Ignite\ApiClient\Models\Disable2faRequest;
use Ignite\ApiClient\Models\Disable2faResponse;
use Ignite\ApiClient\Models\Enable2faRequest;
use Ignite\ApiClient\Models\LoginRequest;
use Ignite\ApiClient\Models\LoginResponse;
use Ignite\ApiClient\Models\MeResponse;
use Ignite\ApiClient\Models\SessionsResponse;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\TwoFactorEnableResponse;
use Ignite\ApiClient\Models\TwoFactorSetupResponse;
use Ignite\ApiClient\Models\UpdateProfileRequest;

final class Auth extends ResourceClient
{
    public function login(LoginRequest $data): LoginResponse
    {
        return LoginResponse::fromArray($this->requestPost('/auth/login', $data->toArray()));
    }

    public function me(): MeResponse
    {
        return MeResponse::fromArray($this->requestGet('/auth/me'));
    }

    public function update_profile(UpdateProfileRequest $data): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPut('/auth/me', $data->toArray()));
    }

    public function logout(): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/auth/logout', []));
    }

    public function logout_all(): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestDelete('/auth/logout'));
    }

    public function change_password(ChangePasswordRequest $data): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestPost('/auth/change-password', $data->toArray()));
    }

    public function sessions(): SessionsResponse
    {
        return SessionsResponse::fromArray($this->requestGet('/auth/sessions'));
    }

    public function revoke_session(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestDelete('/auth/sessions', ['id' => $id]));
    }

    public function setup_2fa(): TwoFactorSetupResponse
    {
        return TwoFactorSetupResponse::fromArray($this->requestGet('/auth/2fa/setup'));
    }

    public function enable_2fa(string $code): TwoFactorEnableResponse
    {
        return TwoFactorEnableResponse::fromArray(
            $this->requestPost('/auth/2fa/setup', (new Enable2faRequest($code))->toArray()),
        );
    }

    public function disable_2fa(string $code, string $password): Disable2faResponse
    {
        return Disable2faResponse::fromArray(
            $this->requestDelete('/auth/2fa/setup', null, (new Disable2faRequest($code, $password))->toArray()),
        );
    }

    // <generated-openapi>
    /**
     * @generated GET /auth/backup-codes
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backup_codes(?array $query = null): array
    {
        return parent::requestGet('/auth/backup-codes', $query);
    }

    /**
     * @generated POST /auth/backup-codes
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_backup_codes(?array $body = null): array
    {
        return parent::requestPost('/auth/backup-codes', $body);
    }

    /**
     * @generated POST /auth/blocklist-appeal
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function blocklist_appeal(?array $body = null): array
    {
        return parent::requestPost('/auth/blocklist-appeal', $body);
    }

    /**
     * @generated POST /auth/code
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function code(?array $body = null): array
    {
        return parent::requestPost('/auth/code', $body);
    }

    /**
     * @generated POST /auth/forgot-password
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function forgot_password(?array $body = null): array
    {
        return parent::requestPost('/auth/forgot-password', $body);
    }

    /**
     * @generated POST /auth/login/begin
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function login_begin(?array $body = null): array
    {
        return parent::requestPost('/auth/login/begin', $body);
    }

    /**
     * @generated PATCH /auth/me
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_me(?array $body = null): array
    {
        return parent::requestPatch('/auth/me', $body);
    }

    /**
     * @generated GET /auth/oauth/[provider]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function oauth(string $provider, ?array $query = null): array
    {
        return parent::requestGet('/auth/oauth/' . self::encode($provider), $query);
    }

    /**
     * @generated GET /auth/oauth/[provider]/callback
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function oauth_callback(string $provider, ?array $query = null): array
    {
        return parent::requestGet('/auth/oauth/' . self::encode($provider) . '/callback', $query);
    }

    /**
     * @generated POST /auth/oauth/2fa-complete
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function oauth_two_fa_complete(?array $body = null): array
    {
        return parent::requestPost('/auth/oauth/2fa-complete', $body);
    }

    /**
     * @generated DELETE /auth/oauth/link/[provider]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_oauth_link(string $provider, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/auth/oauth/link/' . self::encode($provider), $query, $body);
    }

    /**
     * @generated GET /auth/oauth/link/[provider]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function oauth_link(string $provider, ?array $query = null): array
    {
        return parent::requestGet('/auth/oauth/link/' . self::encode($provider), $query);
    }

    /**
     * @generated GET /auth/oauth/providers
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function oauth_providers(?array $query = null): array
    {
        return parent::requestGet('/auth/oauth/providers', $query);
    }

    /**
     * @generated DELETE /auth/passkeys
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_passkeys(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/auth/passkeys', $query, $body);
    }

    /**
     * @generated GET /auth/passkeys
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function passkeys(?array $query = null): array
    {
        return parent::requestGet('/auth/passkeys', $query);
    }

    /**
     * @generated POST /auth/passkeys/authenticate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function passkeys_authenticate(?array $body = null): array
    {
        return parent::requestPost('/auth/passkeys/authenticate', $body);
    }

    /**
     * @generated GET /auth/passkeys/register
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function passkeys_register(?array $query = null): array
    {
        return parent::requestGet('/auth/passkeys/register', $query);
    }

    /**
     * @generated POST /auth/passkeys/register
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_passkeys_register(?array $body = null): array
    {
        return parent::requestPost('/auth/passkeys/register', $body);
    }

    /**
     * @generated POST /auth/register
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function register(?array $body = null): array
    {
        return parent::requestPost('/auth/register', $body);
    }

    /**
     * @generated GET /auth/reset-password
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function reset_password(?array $query = null): array
    {
        return parent::requestGet('/auth/reset-password', $query);
    }

    /**
     * @generated POST /auth/reset-password
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_reset_password(?array $body = null): array
    {
        return parent::requestPost('/auth/reset-password', $body);
    }

    /**
     * @generated GET /auth/session
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function session(?array $query = null): array
    {
        return parent::requestGet('/auth/session', $query);
    }

    /**
     * @generated GET /auth/sso/callback
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sso_callback(?array $query = null): array
    {
        return parent::requestGet('/auth/sso/callback', $query);
    }

    /**
     * @generated POST /auth/sso/link
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sso_link(?array $body = null): array
    {
        return parent::requestPost('/auth/sso/link', $body);
    }

    /**
     * @generated GET /auth/sso/start
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sso_start(?array $query = null): array
    {
        return parent::requestGet('/auth/sso/start', $query);
    }

    /**
     * @generated POST /auth/verify-account
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function verify_account(?array $body = null): array
    {
        return parent::requestPost('/auth/verify-account', $body);
    }

    /**
     * @generated POST /auth/verify-account/resend
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function verify_account_resend(?array $body = null): array
    {
        return parent::requestPost('/auth/verify-account/resend', $body);
    }

    /**
     * @generated POST /auth/verify-code
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function verify_code(?array $body = null): array
    {
        return parent::requestPost('/auth/verify-code', $body);
    }

    /**
     * @generated GET /auth/verify-email
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function verify_email(?array $query = null): array
    {
        return parent::requestGet('/auth/verify-email', $query);
    }

    /**
     * @generated POST /auth/verify-email
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_verify_email(?array $body = null): array
    {
        return parent::requestPost('/auth/verify-email', $body);
    }
    // </generated-openapi>
}
