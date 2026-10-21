<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Team extends ResourceClient
{
    /**
     * @generated GET /team
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function list(?array $query = null): array
    {
        return parent::requestGet('/team', $query);
    }

    /**
     * @generated POST /team
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/team', $body);
    }

    /**
     * @generated DELETE /team/[teamId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(string $teamId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/team/' . self::encode($teamId), $query, $body);
    }

    /**
     * @generated GET /team/[teamId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId), $query);
    }

    /**
     * @generated PATCH /team/[teamId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $teamId, ?array $body = null): array
    {
        return parent::requestPatch('/team/' . self::encode($teamId), $body);
    }

    /**
     * @generated GET /team/[teamId]/audit
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function audit(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/audit', $query);
    }

    /**
     * @generated GET /team/[teamId]/groups
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function groups(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/groups', $query);
    }

    /**
     * @generated POST /team/[teamId]/groups
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_groups(string $teamId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/groups', $body);
    }

    /**
     * @generated DELETE /team/[teamId]/groups/[groupId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_groups(string $teamId, string $groupId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/team/' . self::encode($teamId) . '/groups/' . self::encode($groupId), $query, $body);
    }

    /**
     * @generated PATCH /team/[teamId]/groups/[groupId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_groups(string $teamId, string $groupId, ?array $body = null): array
    {
        return parent::requestPatch('/team/' . self::encode($teamId) . '/groups/' . self::encode($groupId), $body);
    }

    /**
     * @generated DELETE /team/[teamId]/groups/[groupId]/members
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_groups_members(string $teamId, string $groupId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/team/' . self::encode($teamId) . '/groups/' . self::encode($groupId) . '/members', $query, $body);
    }

    /**
     * @generated POST /team/[teamId]/groups/[groupId]/members
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function groups_members(string $teamId, string $groupId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/groups/' . self::encode($groupId) . '/members', $body);
    }

    /**
     * @generated GET /team/[teamId]/invites
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function invites(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/invites', $query);
    }

    /**
     * @generated POST /team/[teamId]/invites
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_invites(string $teamId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/invites', $body);
    }

    /**
     * @generated DELETE /team/[teamId]/invites/[inviteId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_invites(string $teamId, string $inviteId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/team/' . self::encode($teamId) . '/invites/' . self::encode($inviteId), $query, $body);
    }

    /**
     * @generated GET /team/[teamId]/members
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function members(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/members', $query);
    }

    /**
     * @generated DELETE /team/[teamId]/members/[userId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_members(string $teamId, string $userId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/team/' . self::encode($teamId) . '/members/' . self::encode($userId), $query, $body);
    }

    /**
     * @generated PATCH /team/[teamId]/members/[userId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_members(string $teamId, string $userId, ?array $body = null): array
    {
        return parent::requestPatch('/team/' . self::encode($teamId) . '/members/' . self::encode($userId), $body);
    }

    /**
     * @generated POST /team/[teamId]/ownership-transfer
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function ownership_transfer(string $teamId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/ownership-transfer', $body);
    }

    /**
     * @generated GET /team/[teamId]/payment-methods
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function payment_methods(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/payment-methods', $query);
    }

    /**
     * @generated POST /team/[teamId]/payment-methods
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_payment_methods(string $teamId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/payment-methods', $body);
    }

    /**
     * @generated GET /team/[teamId]/projects
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects(string $teamId, ?array $query = null): array
    {
        return parent::requestGet('/team/' . self::encode($teamId) . '/projects', $query);
    }

    /**
     * @generated POST /team/[teamId]/projects
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects(string $teamId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/projects', $body);
    }

    /**
     * @generated POST /team/[teamId]/projects/[projectId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_teamId_projectId(string $teamId, string $projectId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/projects/' . self::encode($projectId), $body);
    }

    /**
     * @generated POST /team/[teamId]/subscriptions/[subscriptionId]/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscriptions_cancel(string $teamId, string $subscriptionId, ?array $body = null): array
    {
        return parent::requestPost('/team/' . self::encode($teamId) . '/subscriptions/' . self::encode($subscriptionId) . '/cancel', $body);
    }

    /**
     * @generated GET /team/invite/[token]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function invite(string $token, ?array $query = null): array
    {
        return parent::requestGet('/team/invite/' . self::encode($token), $query);
    }

    /**
     * @generated POST /team/invite/[token]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_invite(string $token, ?array $body = null): array
    {
        return parent::requestPost('/team/invite/' . self::encode($token), $body);
    }
}
