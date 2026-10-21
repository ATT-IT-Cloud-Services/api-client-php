<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\ApiKeysListResponse;
use Ignite\ApiClient\Models\AuditLogResponse;
use Ignite\ApiClient\Models\CreateApiKeyRequest;
use Ignite\ApiClient\Models\CreateApiKeyResponse;
use Ignite\ApiClient\Models\GdprExportCheckResponse;
use Ignite\ApiClient\Models\GdprExportConfirmRequest;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\SupportPinResponse;

final class User extends ResourceClient
{
    public function audit_log(int $limit): AuditLogResponse
    {
        return AuditLogResponse::fromArray($this->requestGet('/user/audit-log', ['limit' => $limit]));
    }

    public function gdpr_export_check(): GdprExportCheckResponse
    {
        return GdprExportCheckResponse::fromArray($this->requestDelete('/user/gdpr-export'));
    }

    public function gdpr_export_confirm(string $password): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete(
                '/user/gdpr-export',
                ['confirm' => 'true'],
                (new GdprExportConfirmRequest($password))->toArray(),
            ),
        );
    }

    public function api_keys(int $page, int $pageSize): ApiKeysListResponse
    {
        return ApiKeysListResponse::fromArray(
            $this->requestGet('/api-keys', ['page' => $page, 'pageSize' => $pageSize]),
        );
    }

    public function create_api_key(string $name): CreateApiKeyResponse
    {
        return CreateApiKeyResponse::fromArray(
            $this->requestPost('/api-keys', (new CreateApiKeyRequest($name))->toArray()),
        );
    }

    public function revoke_api_key(string $id): SuccessResponse
    {
        return SuccessResponse::fromArray($this->requestDelete('/api-keys', ['id' => $id]));
    }

    public function support_pin(): SupportPinResponse
    {
        return SupportPinResponse::fromArray($this->requestGet('/user/support-pin'));
    }

    public function generate_support_pin(): SupportPinResponse
    {
        return SupportPinResponse::fromArray($this->requestPost('/user/support-pin', []));
    }

    // <generated-openapi>
    /**
     * @generated GET /api-keys/usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function usage(?array $query = null): array
    {
        return parent::requestGet('/api-keys/usage', $query);
    }

    /**
     * @generated GET /user/autopay
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function autopay(?array $query = null): array
    {
        return parent::requestGet('/user/autopay', $query);
    }

    /**
     * @generated PATCH /user/autopay
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_autopay(?array $body = null): array
    {
        return parent::requestPatch('/user/autopay', $body);
    }

    /**
     * @generated GET /user/business-data-review
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function business_data_review(?array $query = null): array
    {
        return parent::requestGet('/user/business-data-review', $query);
    }

    /**
     * @generated POST /user/change-email
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function change_email(?array $body = null): array
    {
        return parent::requestPost('/user/change-email', $body);
    }

    /**
     * @generated POST /user/change-email/verify-new
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function change_email_verify_new(?array $body = null): array
    {
        return parent::requestPost('/user/change-email/verify-new', $body);
    }

    /**
     * @generated POST /user/change-email/verify-old
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function change_email_verify_old(?array $body = null): array
    {
        return parent::requestPost('/user/change-email/verify-old', $body);
    }

    /**
     * @generated POST /user/date-of-birth
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function date_of_birth(?array $body = null): array
    {
        return parent::requestPost('/user/date-of-birth', $body);
    }

    /**
     * @generated DELETE /user/discord
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_discord(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/user/discord', $query, $body);
    }

    /**
     * @generated GET /user/discord
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function discord(?array $query = null): array
    {
        return parent::requestGet('/user/discord', $query);
    }

    /**
     * @generated PATCH /user/discord
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_discord(?array $body = null): array
    {
        return parent::requestPatch('/user/discord', $body);
    }

    /**
     * @generated POST /user/discord
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_discord(?array $body = null): array
    {
        return parent::requestPost('/user/discord', $body);
    }

    /**
     * @generated GET /user/dpa
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function dpa(?array $query = null): array
    {
        return parent::requestGet('/user/dpa', $query);
    }

    /**
     * @generated POST /user/dpa
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_dpa(?array $body = null): array
    {
        return parent::requestPost('/user/dpa', $body);
    }

    /**
     * @generated POST /user/dpa/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function dpa_cancel(?array $body = null): array
    {
        return parent::requestPost('/user/dpa/cancel', $body);
    }

    /**
     * @generated GET /user/dpa/documents/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function dpa_documents(string $id, ?array $query = null): array
    {
        return parent::requestGet('/user/dpa/documents/' . self::encode($id), $query);
    }

    /**
     * @generated GET /user/gdpr-export
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function gdpr_export(?array $query = null): array
    {
        return parent::requestGet('/user/gdpr-export', $query);
    }

    /**
     * @generated GET /user/gdpr-export/history
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function gdpr_export_history(?array $query = null): array
    {
        return parent::requestGet('/user/gdpr-export/history', $query);
    }

    /**
     * @generated GET /user/gdpr-export/history/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_gdpr_export_history(string $id, ?array $query = null): array
    {
        return parent::requestGet('/user/gdpr-export/history/' . self::encode($id), $query);
    }

    /**
     * @generated POST /user/id-verification/[id]/decline
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_decline(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/decline', $body);
    }

    /**
     * @generated POST /user/id-verification/[id]/enjyn-restart
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_enjyn_restart(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/enjyn-restart', $body);
    }

    /**
     * @generated POST /user/id-verification/[id]/enjyn-start
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_enjyn_start(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/enjyn-start', $body);
    }

    /**
     * @generated POST /user/id-verification/[id]/method
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_method(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/method', $body);
    }

    /**
     * @generated POST /user/id-verification/[id]/refuse
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_refuse(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/refuse', $body);
    }

    /**
     * @generated POST /user/id-verification/[id]/upload
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_upload(string $id, ?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/' . self::encode($id) . '/upload', $body);
    }

    /**
     * @generated GET /user/id-verification/enforcement-status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function id_verification_enforcement_status(?array $query = null): array
    {
        return parent::requestGet('/user/id-verification/enforcement-status', $query);
    }

    /**
     * @generated POST /user/id-verification/enjyn-callback
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_enjyn_callback(?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/enjyn-callback', $body);
    }

    /**
     * @generated POST /user/id-verification/start
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function id_verification_start(?array $body = null): array
    {
        return parent::requestPost('/user/id-verification/start', $body);
    }

    /**
     * @generated GET /user/id-verification/status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function id_verification_status(?array $query = null): array
    {
        return parent::requestGet('/user/id-verification/status', $query);
    }

    /**
     * @generated GET /user/newsletter-settings
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function newsletter_settings(?array $query = null): array
    {
        return parent::requestGet('/user/newsletter-settings', $query);
    }

    /**
     * @generated POST /user/newsletter-settings
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_newsletter_settings(?array $body = null): array
    {
        return parent::requestPost('/user/newsletter-settings', $body);
    }

    /**
     * @generated GET /user/notifications
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function notifications(?array $query = null): array
    {
        return parent::requestGet('/user/notifications', $query);
    }

    /**
     * @generated PATCH /user/notifications
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_notifications(?array $body = null): array
    {
        return parent::requestPatch('/user/notifications', $body);
    }

    /**
     * @generated GET /user/notifications/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_notifications(string $id, ?array $query = null): array
    {
        return parent::requestGet('/user/notifications/' . self::encode($id), $query);
    }

    /**
     * @generated PATCH /user/notifications/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function patch_update_notifications(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/user/notifications/' . self::encode($id), $body);
    }

    /**
     * @generated GET /user/profile-review
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function profile_review(?array $query = null): array
    {
        return parent::requestGet('/user/profile-review', $query);
    }

    /**
     * @generated POST /user/profile-review/confirm
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function profile_review_confirm(?array $body = null): array
    {
        return parent::requestPost('/user/profile-review/confirm', $body);
    }

    /**
     * @generated DELETE /user/push/device-token
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_push_device_token(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/user/push/device-token', $query, $body);
    }

    /**
     * @generated POST /user/push/device-token
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function push_device_token(?array $body = null): array
    {
        return parent::requestPost('/user/push/device-token', $body);
    }

    /**
     * @generated GET /user/push/preferences
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function push_preferences(?array $query = null): array
    {
        return parent::requestGet('/user/push/preferences', $query);
    }

    /**
     * @generated PATCH /user/push/preferences
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_push_preferences(?array $body = null): array
    {
        return parent::requestPatch('/user/push/preferences', $body);
    }

    /**
     * @generated GET /user/push/public-key
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function push_public_key(?array $query = null): array
    {
        return parent::requestGet('/user/push/public-key', $query);
    }

    /**
     * @generated DELETE /user/push/subscribe
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_push_subscribe(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/user/push/subscribe', $query, $body);
    }

    /**
     * @generated POST /user/push/subscribe
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function push_subscribe(?array $body = null): array
    {
        return parent::requestPost('/user/push/subscribe', $body);
    }

    /**
     * @generated PATCH /user/settings
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_settings(?array $body = null): array
    {
        return parent::requestPatch('/user/settings', $body);
    }

    /**
     * @generated DELETE /user/sso
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_sso(?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/user/sso', $query, $body);
    }

    /**
     * @generated GET /user/sso
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sso(?array $query = null): array
    {
        return parent::requestGet('/user/sso', $query);
    }

    /**
     * @generated PATCH /user/sso
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_sso(?array $body = null): array
    {
        return parent::requestPatch('/user/sso', $body);
    }

    /**
     * @generated POST /user/sso
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_sso(?array $body = null): array
    {
        return parent::requestPost('/user/sso', $body);
    }

    /**
     * @generated POST /user/subscriptions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscriptions(?array $body = null): array
    {
        return parent::requestPost('/user/subscriptions', $body);
    }

    /**
     * @generated GET /user/support-phone
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function support_phone(?array $query = null): array
    {
        return parent::requestGet('/user/support-phone', $query);
    }
    // </generated-openapi>
}
