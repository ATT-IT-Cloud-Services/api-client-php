<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\CreateFamilyGroupRequest;
use Ignite\ApiClient\Models\CreateFamilyGroupResponse;
use Ignite\ApiClient\Models\FamilyBalanceRequestsResponse;
use Ignite\ApiClient\Models\FamilyGroupResponse;
use Ignite\ApiClient\Models\FamilyInviteRequest;
use Ignite\ApiClient\Models\FamilyInviteResponse;
use Ignite\ApiClient\Models\FamilyInvitesResponse;
use Ignite\ApiClient\Models\FamilyMembersResponse;
use Ignite\ApiClient\Models\SuccessResponse;
use Ignite\ApiClient\Models\UpdateFamilyMemberRequest;

final class Family extends ResourceClient
{
    public function group(): FamilyGroupResponse
    {
        return FamilyGroupResponse::fromArray($this->requestGet('/family'));
    }

    public function create(string $name): CreateFamilyGroupResponse
    {
        return CreateFamilyGroupResponse::fromArray(
            $this->requestPost('/family', (new CreateFamilyGroupRequest($name))->toArray()),
        );
    }

    public function invites(string $groupId): FamilyInvitesResponse
    {
        return FamilyInvitesResponse::fromArray(
            $this->requestGet('/family/' . $groupId . '/invites'),
        );
    }

    public function members(string $groupId): FamilyMembersResponse
    {
        return FamilyMembersResponse::fromArray(
            $this->requestGet('/family/' . $groupId . '/members'),
        );
    }

    public function invite(string $groupId, string $email, string $role): FamilyInviteResponse
    {
        return FamilyInviteResponse::fromArray(
            $this->requestPost(
                '/family/' . $groupId . '/invites',
                (new FamilyInviteRequest($email, $role))->toArray(),
            ),
        );
    }

    public function balance_requests(string $groupId, ?string $status = null): FamilyBalanceRequestsResponse
    {
        $query = $status !== null ? ['status' => $status] : null;

        return FamilyBalanceRequestsResponse::fromArray(
            $this->requestGet('/family/' . $groupId . '/balance-requests', $query),
        );
    }

    public function remove_member(string $groupId, string $userId): SuccessResponse
    {
        return SuccessResponse::fromArray(
            $this->requestDelete('/family/' . $groupId . '/members/' . self::encode($userId)),
        );
    }

    public function update_member(
        string $groupId,
        string $userId,
        UpdateFamilyMemberRequest $body,
    ): SuccessResponse {
        return SuccessResponse::fromArray(
            $this->requestPatch(
                '/family/' . $groupId . '/members/' . self::encode($userId),
                $body->toArray(),
            ),
        );
    }

    // <generated-openapi>
    /**
     * @generated DELETE /family/[groupId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(string $groupId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId), $query, $body);
    }

    /**
     * @generated GET /family/[groupId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId), $query);
    }

    /**
     * @generated PATCH /family/[groupId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $groupId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId), $body);
    }

    /**
     * @generated GET /family/[groupId]/audit
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function audit(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/audit', $query);
    }

    /**
     * @generated GET /family/[groupId]/auto-topup
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function auto_topup(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/auto-topup', $query);
    }

    /**
     * @generated POST /family/[groupId]/auto-topup
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_auto_topup(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/auto-topup', $body);
    }

    /**
     * @generated POST /family/[groupId]/balance-requests
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_balance_requests(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/balance-requests', $body);
    }

    /**
     * @generated PATCH /family/[groupId]/balance-requests/[requestId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_balance_requests(string $groupId, string $requestId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/balance-requests/' . self::encode($requestId), $body);
    }

    /**
     * @generated GET /family/[groupId]/billing
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function billing(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/billing', $query);
    }

    /**
     * @generated PATCH /family/[groupId]/billing
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_billing(string $groupId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/billing', $body);
    }

    /**
     * @generated POST /family/[groupId]/billing
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_billing(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/billing', $body);
    }

    /**
     * @generated GET /family/[groupId]/billing/mandates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function billing_mandates(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/billing/mandates', $query);
    }

    /**
     * @generated PATCH /family/[groupId]/billing/mandates
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_billing_mandates(string $groupId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/billing/mandates', $body);
    }

    /**
     * @generated POST /family/[groupId]/billing/mandates
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_billing_mandates(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/billing/mandates', $body);
    }

    /**
     * @generated DELETE /family/[groupId]/billing/mandates/[mandateId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_billing_mandates(string $groupId, string $mandateId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/billing/mandates/' . self::encode($mandateId), $query, $body);
    }

    /**
     * @generated GET /family/[groupId]/consent
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function consent(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/consent', $query);
    }

    /**
     * @generated PATCH /family/[groupId]/consent
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_consent(string $groupId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/consent', $body);
    }

    /**
     * @generated POST /family/[groupId]/consent
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_consent(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/consent', $body);
    }

    /**
     * @generated GET /family/[groupId]/controls/locks
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function controls_locks(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/controls/locks', $query);
    }

    /**
     * @generated POST /family/[groupId]/controls/locks
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_controls_locks(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/controls/locks', $body);
    }

    /**
     * @generated DELETE /family/[groupId]/controls/locks/[lockId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_controls_locks(string $groupId, string $lockId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/controls/locks/' . self::encode($lockId), $query, $body);
    }

    /**
     * @generated GET /family/[groupId]/controls/resource-limits
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function controls_resource_limits(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/controls/resource-limits', $query);
    }

    /**
     * @generated POST /family/[groupId]/controls/resource-limits
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_controls_resource_limits(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/controls/resource-limits', $body);
    }

    /**
     * @generated DELETE /family/[groupId]/controls/resource-limits/[limitId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_controls_resource_limits(string $groupId, string $limitId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/controls/resource-limits/' . self::encode($limitId), $query, $body);
    }

    /**
     * @generated PATCH /family/[groupId]/controls/resource-limits/[limitId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_controls_resource_limits(string $groupId, string $limitId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/controls/resource-limits/' . self::encode($limitId), $body);
    }

    /**
     * @generated GET /family/[groupId]/controls/time-policies
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function controls_time_policies(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/controls/time-policies', $query);
    }

    /**
     * @generated POST /family/[groupId]/controls/time-policies
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_controls_time_policies(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/controls/time-policies', $body);
    }

    /**
     * @generated DELETE /family/[groupId]/controls/time-policies/[policyId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_controls_time_policies(string $groupId, string $policyId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/controls/time-policies/' . self::encode($policyId), $query, $body);
    }

    /**
     * @generated PATCH /family/[groupId]/controls/time-policies/[policyId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_controls_time_policies(string $groupId, string $policyId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/controls/time-policies/' . self::encode($policyId), $body);
    }

    /**
     * @generated DELETE /family/[groupId]/gdpr
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_gdpr(string $groupId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/gdpr', $query, $body);
    }

    /**
     * @generated GET /family/[groupId]/gdpr
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function gdpr(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/gdpr', $query);
    }

    /**
     * @generated POST /family/[groupId]/gdpr
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_gdpr(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/gdpr', $body);
    }

    /**
     * @generated POST /family/[groupId]/members
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_members(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/members', $body);
    }

    /**
     * @generated GET /family/[groupId]/messages
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function messages(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/messages', $query);
    }

    /**
     * @generated POST /family/[groupId]/messages
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_messages(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/messages', $body);
    }

    /**
     * @generated PATCH /family/[groupId]/messages/[messageId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_messages(string $groupId, string $messageId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/messages/' . self::encode($messageId), $body);
    }

    /**
     * @generated GET /family/[groupId]/monitoring
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/monitoring', $query);
    }

    /**
     * @generated GET /family/[groupId]/payment-approvals
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function payment_approvals(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/payment-approvals', $query);
    }

    /**
     * @generated PATCH /family/[groupId]/payment-approvals/[approvalId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_payment_approvals(string $groupId, string $approvalId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/payment-approvals/' . self::encode($approvalId), $body);
    }

    /**
     * @generated GET /family/[groupId]/spending-limits
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function spending_limits(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/spending-limits', $query);
    }

    /**
     * @generated POST /family/[groupId]/spending-limits
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_spending_limits(string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/family/' . self::encode($groupId) . '/spending-limits', $body);
    }

    /**
     * @generated DELETE /family/[groupId]/spending-limits/[limitId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_spending_limits(string $groupId, string $limitId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/family/' . self::encode($groupId) . '/spending-limits/' . self::encode($limitId), $query, $body);
    }

    /**
     * @generated PATCH /family/[groupId]/spending-limits/[limitId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_spending_limits(string $groupId, string $limitId, ?array $body = null): array
    {
        return parent::requestPatch('/family/' . self::encode($groupId) . '/spending-limits/' . self::encode($limitId), $body);
    }

    /**
     * @generated GET /family/[groupId]/usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function usage(string $groupId, ?array $query = null): array
    {
        return parent::requestGet('/family/' . self::encode($groupId) . '/usage', $query);
    }

    /**
     * @generated GET /family/invite/[token]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_invite(string $token, ?array $query = null): array
    {
        return parent::requestGet('/family/invite/' . self::encode($token), $query);
    }

    /**
     * @generated POST /family/invite/[token]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_invite(string $token, ?array $body = null): array
    {
        return parent::requestPost('/family/invite/' . self::encode($token), $body);
    }
    // </generated-openapi>
}
