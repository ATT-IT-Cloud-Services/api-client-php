<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Pods extends ResourceClient
{
    /**
     * @generated DELETE /pods/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/' . self::encode($id), $query, $body);
    }

    /**
     * @generated GET /pods/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id), $query);
    }

    /**
     * @generated PATCH /pods/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/' . self::encode($id), $body);
    }

    /**
     * @generated GET /pods/[id]/actions
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function actions(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/actions', $query);
    }

    /**
     * @generated POST /pods/[id]/actions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_actions(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/actions', $body);
    }

    /**
     * @generated DELETE /pods/[id]/allocations
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_allocations(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/' . self::encode($id) . '/allocations', $query, $body);
    }

    /**
     * @generated POST /pods/[id]/allocations
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function allocations(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/allocations', $body);
    }

    /**
     * @generated GET /pods/[id]/backups
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backups(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/backups', $query);
    }

    /**
     * @generated POST /pods/[id]/backups
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_backups(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/backups', $body);
    }

    /**
     * @generated GET /pods/[id]/backups/[backupId]/download
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backups_download(string $id, string $backupId, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/backups/' . self::encode($backupId) . '/download', $query);
    }

    /**
     * @generated GET /pods/[id]/deploy
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function deploy(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/deploy', $query);
    }

    /**
     * @generated DELETE /pods/[id]/domains
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_domains(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/' . self::encode($id) . '/domains', $query, $body);
    }

    /**
     * @generated GET /pods/[id]/domains
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function domains(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/domains', $query);
    }

    /**
     * @generated POST /pods/[id]/domains
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_domains(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/domains', $body);
    }

    /**
     * @generated GET /pods/[id]/env
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function env(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/env', $query);
    }

    /**
     * @generated PUT /pods/[id]/env
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_env(string $id, ?array $body = null): array
    {
        return parent::requestPut('/pods/' . self::encode($id) . '/env', $body);
    }

    /**
     * @generated GET /pods/[id]/files
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function files(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/files', $query);
    }

    /**
     * @generated POST /pods/[id]/files
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_files(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/files', $body);
    }

    /**
     * @generated DELETE /pods/[id]/forwards
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_forwards(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/' . self::encode($id) . '/forwards', $query, $body);
    }

    /**
     * @generated GET /pods/[id]/forwards
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function forwards(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/forwards', $query);
    }

    /**
     * @generated PATCH /pods/[id]/forwards
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_forwards(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/' . self::encode($id) . '/forwards', $body);
    }

    /**
     * @generated POST /pods/[id]/forwards
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_forwards(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/forwards', $body);
    }

    /**
     * @generated GET /pods/[id]/logs
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function logs(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/logs', $query);
    }

    /**
     * @generated POST /pods/[id]/logs
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_logs(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/logs', $body);
    }

    /**
     * @generated GET /pods/[id]/platform
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function platform(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/platform', $query);
    }

    /**
     * @generated PUT /pods/[id]/platform
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_platform(string $id, ?array $body = null): array
    {
        return parent::requestPut('/pods/' . self::encode($id) . '/platform', $body);
    }

    /**
     * @generated DELETE /pods/[id]/ports
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_ports(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/' . self::encode($id) . '/ports', $query, $body);
    }

    /**
     * @generated GET /pods/[id]/ports
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function ports(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/ports', $query);
    }

    /**
     * @generated PATCH /pods/[id]/ports
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_ports(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/' . self::encode($id) . '/ports', $body);
    }

    /**
     * @generated POST /pods/[id]/ports
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_ports(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/ports', $body);
    }

    /**
     * @generated GET /pods/[id]/revisions
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function revisions(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/revisions', $query);
    }

    /**
     * @generated POST /pods/[id]/revisions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_revisions(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/revisions', $body);
    }

    /**
     * @generated GET /pods/[id]/schedules
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function schedules(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/schedules', $query);
    }

    /**
     * @generated POST /pods/[id]/schedules
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_schedules(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/schedules', $body);
    }

    /**
     * @generated GET /pods/[id]/stats
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function stats(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/stats', $query);
    }

    /**
     * @generated POST /pods/[id]/transfer
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function transfer(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/transfer', $body);
    }

    /**
     * @generated GET /pods/[id]/volume
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function volume(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/volume', $query);
    }

    /**
     * @generated POST /pods/[id]/volume
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_volume(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/volume', $body);
    }

    /**
     * @generated GET /pods/[id]/volumes
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function volumes(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/' . self::encode($id) . '/volumes', $query);
    }

    /**
     * @generated POST /pods/[id]/volumes
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_volumes(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/' . self::encode($id) . '/volumes', $body);
    }

    /**
     * @generated GET /pods/access
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function access(?array $query = null): array
    {
        return parent::requestGet('/pods/access', $query);
    }

    /**
     * @generated GET /pods/api-keys
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function api_keys(?array $query = null): array
    {
        return parent::requestGet('/pods/api-keys', $query);
    }

    /**
     * @generated POST /pods/api-keys
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_api_keys(?array $body = null): array
    {
        return parent::requestPost('/pods/api-keys', $body);
    }

    /**
     * @generated DELETE /pods/api-keys/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_api_keys(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/api-keys/' . self::encode($id), $query, $body);
    }

    /**
     * @generated GET /pods/audit
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function audit(?array $query = null): array
    {
        return parent::requestGet('/pods/audit', $query);
    }

    /**
     * @generated GET /pods/billing
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function billing(?array $query = null): array
    {
        return parent::requestGet('/pods/billing', $query);
    }

    /**
     * @generated GET /pods/cost-centers
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function cost_centers(?array $query = null): array
    {
        return parent::requestGet('/pods/cost-centers', $query);
    }

    /**
     * @generated POST /pods/cost-centers
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_cost_centers(?array $body = null): array
    {
        return parent::requestPost('/pods/cost-centers', $body);
    }

    /**
     * @generated GET /pods/events
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function events(?array $query = null): array
    {
        return parent::requestGet('/pods/events', $query);
    }

    /**
     * @generated POST /pods/events
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_events(?array $body = null): array
    {
        return parent::requestPost('/pods/events', $body);
    }

    /**
     * @generated DELETE /pods/ips/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_ips(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/ips/' . self::encode($id), $query, $body);
    }

    /**
     * @generated PATCH /pods/ips/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_ips(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/ips/' . self::encode($id), $body);
    }

    /**
     * @generated GET /pods/metrics
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function metrics(?array $query = null): array
    {
        return parent::requestGet('/pods/metrics', $query);
    }

    /**
     * @generated POST /pods/metrics
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_metrics(?array $body = null): array
    {
        return parent::requestPost('/pods/metrics', $body);
    }

    /**
     * @generated GET /pods/notification-channels
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function notification_channels(?array $query = null): array
    {
        return parent::requestGet('/pods/notification-channels', $query);
    }

    /**
     * @generated POST /pods/notification-channels
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_notification_channels(?array $body = null): array
    {
        return parent::requestPost('/pods/notification-channels', $body);
    }

    /**
     * @generated GET /pods/notifications
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function notifications(?array $query = null): array
    {
        return parent::requestGet('/pods/notifications', $query);
    }

    /**
     * @generated POST /pods/notifications
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_notifications(?array $body = null): array
    {
        return parent::requestPost('/pods/notifications', $body);
    }

    /**
     * @generated GET /pods/packages
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function packages(?array $query = null): array
    {
        return parent::requestGet('/pods/packages', $query);
    }

    /**
     * @generated POST /pods/packages
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_packages(?array $body = null): array
    {
        return parent::requestPost('/pods/packages', $body);
    }

    /**
     * @generated GET /pods/projects
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects(?array $query = null): array
    {
        return parent::requestGet('/pods/projects', $query);
    }

    /**
     * @generated POST /pods/projects
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects(?array $body = null): array
    {
        return parent::requestPost('/pods/projects', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id), $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_projects(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id), $query);
    }

    /**
     * @generated PATCH /pods/projects/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_projects(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/projects/' . self::encode($id), $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/backup-policy
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_backup_policy(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/backup-policy', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/backup-policy
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_backup_policy(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/backup-policy', $query);
    }

    /**
     * @generated PUT /pods/projects/[id]/backup-policy
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_projects_backup_policy(string $id, ?array $body = null): array
    {
        return parent::requestPut('/pods/projects/' . self::encode($id) . '/backup-policy', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/billing-report
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_billing_report(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/billing-report', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/bulk
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_bulk(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/bulk', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/certificates
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_certificates(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/certificates', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/certificates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_certificates(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/certificates', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/certificates
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_certificates(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/certificates', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/compose
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_compose(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/compose', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/compose
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_compose(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/compose', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/databases
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_databases(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/databases', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/databases
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_databases(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/databases', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/databases
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_databases(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/databases', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/gateway-tokens
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_gateway_tokens(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/gateway-tokens', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/gateway-tokens
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_gateway_tokens(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/gateway-tokens', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/gateway-tokens
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_gateway_tokens(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/gateway-tokens', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/git
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_git(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/git', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/git
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_git(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/git', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/images
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_images(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/images', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/images
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_images(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/images', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/ips
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_ips(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/ips', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/ips
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_ips(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/ips', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/ips/available
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_ips_available(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/ips/available', $query);
    }

    /**
     * @generated GET /pods/projects/[id]/jobs
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_jobs(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/jobs', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/jobs
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_jobs(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/jobs', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/listeners
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_listeners(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/listeners', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/listeners
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_listeners(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/listeners', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/listeners
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_listeners(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/listeners', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/networks
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_networks(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/networks', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/networks
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_networks(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/networks', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/pods
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_pods(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/pods', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/pods
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_pods(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/pods', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/reference
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_reference(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/reference', $query);
    }

    /**
     * @generated DELETE /pods/projects/[id]/runtime-groups
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_runtime_groups(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/runtime-groups', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/runtime-groups
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_runtime_groups(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/runtime-groups', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/runtime-groups
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_runtime_groups(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/runtime-groups', $body);
    }

    /**
     * @generated DELETE /pods/projects/[id]/storage-backends
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_projects_storage_backends(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/projects/' . self::encode($id) . '/storage-backends', $query, $body);
    }

    /**
     * @generated GET /pods/projects/[id]/storage-backends
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_storage_backends(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/storage-backends', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/storage-backends
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_storage_backends(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/storage-backends', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/templates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_templates(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/templates', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/templates
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_templates(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/templates', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/transfer
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_transfer(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/transfer', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/transfer
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_transfer(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/transfer', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_usage(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/usage', $query);
    }

    /**
     * @generated GET /pods/projects/[id]/volumes
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_volumes(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/volumes', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/volumes
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_volumes(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/volumes', $body);
    }

    /**
     * @generated GET /pods/projects/[id]/workflow
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_workflow(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/projects/' . self::encode($id) . '/workflow', $query);
    }

    /**
     * @generated POST /pods/projects/[id]/workflow
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_workflow(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/projects/' . self::encode($id) . '/workflow', $body);
    }

    /**
     * @generated GET /pods/rdns-zones
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function rdns_zones(?array $query = null): array
    {
        return parent::requestGet('/pods/rdns-zones', $query);
    }

    /**
     * @generated GET /pods/regions
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function regions(?array $query = null): array
    {
        return parent::requestGet('/pods/regions', $query);
    }

    /**
     * @generated GET /pods/registry
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function registry(?array $query = null): array
    {
        return parent::requestGet('/pods/registry', $query);
    }

    /**
     * @generated GET /pods/ssh-keys
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function ssh_keys(?array $query = null): array
    {
        return parent::requestGet('/pods/ssh-keys', $query);
    }

    /**
     * @generated POST /pods/ssh-keys
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_ssh_keys(?array $body = null): array
    {
        return parent::requestPost('/pods/ssh-keys', $body);
    }

    /**
     * @generated DELETE /pods/ssh-keys/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_ssh_keys(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/ssh-keys/' . self::encode($id), $query, $body);
    }

    /**
     * @generated PATCH /pods/ssh-keys/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_ssh_keys(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/pods/ssh-keys/' . self::encode($id), $body);
    }

    /**
     * @generated GET /pods/tenants
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tenants(?array $query = null): array
    {
        return parent::requestGet('/pods/tenants', $query);
    }

    /**
     * @generated POST /pods/tenants
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_tenants(?array $body = null): array
    {
        return parent::requestPost('/pods/tenants', $body);
    }

    /**
     * @generated DELETE /pods/tenants/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_tenants(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/tenants/' . self::encode($id), $query, $body);
    }

    /**
     * @generated DELETE /pods/tenants/[id]/access
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_tenants_access(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/tenants/' . self::encode($id) . '/access', $query, $body);
    }

    /**
     * @generated GET /pods/tenants/[id]/access
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tenants_access(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/tenants/' . self::encode($id) . '/access', $query);
    }

    /**
     * @generated POST /pods/tenants/[id]/access
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_tenants_access(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/tenants/' . self::encode($id) . '/access', $body);
    }

    /**
     * @generated DELETE /pods/tenants/[id]/transfer-keys
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_tenants_transfer_keys(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/tenants/' . self::encode($id) . '/transfer-keys', $query, $body);
    }

    /**
     * @generated GET /pods/tenants/[id]/transfer-keys
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tenants_transfer_keys(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/tenants/' . self::encode($id) . '/transfer-keys', $query);
    }

    /**
     * @generated POST /pods/tenants/[id]/transfer-keys
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_tenants_transfer_keys(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/tenants/' . self::encode($id) . '/transfer-keys', $body);
    }

    /**
     * @generated GET /pods/transfers/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function transfers(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/transfers/' . self::encode($id), $query);
    }

    /**
     * @generated POST /pods/transfers/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_transfers(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/transfers/' . self::encode($id), $body);
    }

    /**
     * @generated GET /pods/tree
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tree(?array $query = null): array
    {
        return parent::requestGet('/pods/tree', $query);
    }

    /**
     * @generated GET /pods/wallet
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function wallet(?array $query = null): array
    {
        return parent::requestGet('/pods/wallet', $query);
    }

    /**
     * @generated POST /pods/wallet
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_wallet(?array $body = null): array
    {
        return parent::requestPost('/pods/wallet', $body);
    }

    /**
     * @generated GET /pods/webhooks
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function webhooks(?array $query = null): array
    {
        return parent::requestGet('/pods/webhooks', $query);
    }

    /**
     * @generated POST /pods/webhooks
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_webhooks(?array $body = null): array
    {
        return parent::requestPost('/pods/webhooks', $body);
    }

    /**
     * @generated DELETE /pods/webhooks/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_webhooks(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/pods/webhooks/' . self::encode($id), $query, $body);
    }

    /**
     * @generated POST /pods/webhooks/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_webhooks_id(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/webhooks/' . self::encode($id), $body);
    }

    /**
     * @generated GET /pods/webhooks/[id]/deliveries
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function webhooks_deliveries(string $id, ?array $query = null): array
    {
        return parent::requestGet('/pods/webhooks/' . self::encode($id) . '/deliveries', $query);
    }

    /**
     * @generated POST /pods/webhooks/[id]/rotate-secret
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function webhooks_rotate_secret(string $id, ?array $body = null): array
    {
        return parent::requestPost('/pods/webhooks/' . self::encode($id) . '/rotate-secret', $body);
    }
}
