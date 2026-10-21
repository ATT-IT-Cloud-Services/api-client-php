<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\ActionDispatchResponse;
use Ignite\ApiClient\Models\ProviderViewResponse;
use Ignite\ApiClient\Models\ServiceDetailResponse;
use Ignite\ApiClient\Models\ServiceListResponse;
use Ignite\ApiClient\Models\StatusBatchRequest;
use Ignite\ApiClient\Models\StatusBatchResponse;

final class Services extends ResourceClient
{
    public function find(string $id): ServiceDetailResponse
    {
        return ServiceDetailResponse::fromArray($this->requestGet('/services/' . $id));
    }

    public function list(int $limit, ?string $view = null): ServiceListResponse
    {
        $query = ['limit' => $limit];
        if ($view !== null) {
            $query['view'] = $view;
        }

        return ServiceListResponse::fromArray($this->requestGet('/services', $query));
    }

    public function view(string $id): ProviderViewResponse
    {
        return ProviderViewResponse::fromArray(
            $this->requestGet('/services/' . self::encode($id) . '/view'),
        );
    }

    /** @param array<string, mixed>|null $body */
    public function action(string $id, string $key, ?array $body = null): ActionDispatchResponse
    {
        return ActionDispatchResponse::fromArray(
            $this->requestPost(
                '/services/' . self::encode($id) . '/actions/' . self::encode($key),
                $body ?? [],
            ),
        );
    }

    /** @param list<string> $ids */
    public function status_batch(array $ids): StatusBatchResponse
    {
        return StatusBatchResponse::fromArray(
            $this->requestPost('/services/status-batch', (new StatusBatchRequest($ids))->toArray()),
        );
    }

    /** @return array<string, mixed> */
    public function storage_history(string $id, int $hours = 72): array
    {
        return $this->requestGet(
            '/services/' . self::encode($id) . '/ploi/storage-history',
            ['hours' => $hours],
        );
    }

    /** @param array<string, mixed>|null $body @return array<string, mixed> */
    public function site_dns(string $id, ?array $body = null): array
    {
        $path = '/services/' . self::encode($id) . '/ploi/dns';
        return $body !== null ? $this->requestPost($path, $body) : $this->requestGet($path);
    }

    /** @return array<string, mixed> */
    public function hosting_credentials(string $id): array
    {
        return $this->requestGet('/services/' . self::encode($id) . '/plesk/credentials');
    }

    /** @return array<string, mixed> */
    public function rotate_hosting_credentials(string $id): array
    {
        return $this->requestPost('/services/' . self::encode($id) . '/plesk/credentials', []);
    }

    /** @return array<string, mixed> */
    public function hosting_domains(string $id): array
    {
        return $this->requestGet('/services/' . self::encode($id) . '/plesk/domains');
    }

    /** @return array<string, mixed> */
    public function refresh_hosting_domains(string $id): array
    {
        return $this->requestPost('/services/' . self::encode($id) . '/plesk/domains', []);
    }

    // <generated-openapi>
    /**
     * @generated POST /services
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function create(?array $body = null): array
    {
        return parent::requestPost('/services', $body);
    }

    /**
     * @generated DELETE /services/[id]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function remove(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id), $query, $body);
    }

    /**
     * @generated PATCH /services/[id]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id), $body);
    }

    /**
     * @generated POST /services/[id]/action
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_action(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/action', $body);
    }

    /**
     * @generated GET /services/[id]/activity
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function activity(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/activity', $query);
    }

    /**
     * @generated GET /services/[id]/allocations
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function allocations(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/allocations', $query);
    }

    /**
     * @generated POST /services/[id]/apply-downgrade
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function apply_downgrade(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/apply-downgrade', $body);
    }

    /**
     * @generated GET /services/[id]/backup-storage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backup_storage(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/backup-storage', $query);
    }

    /**
     * @generated POST /services/[id]/backup-storage/namespaces
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function backup_storage_namespaces(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/backup-storage/namespaces', $body);
    }

    /**
     * @generated DELETE /services/[id]/backup-storage/namespaces/[...path]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_backup_storage_namespaces(string $id, string $wildcard, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/backup-storage/namespaces/' . ltrim($wildcard, '/'), $query, $body);
    }

    /**
     * @generated GET /services/[id]/backups
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backups(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/backups', $query);
    }

    /**
     * @generated POST /services/[id]/backups
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_backups(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/backups', $body);
    }

    /**
     * @generated DELETE /services/[id]/backups/[backupId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_backups(string $id, string $backupId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/backups/' . self::encode($backupId), $query, $body);
    }

    /**
     * @generated POST /services/[id]/backups/[backupId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_backups_id_backupId(string $id, string $backupId, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/backups/' . self::encode($backupId), $body);
    }

    /**
     * @generated GET /services/[id]/backups/[backupId]/download
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backups_download(string $id, string $backupId, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/backups/' . self::encode($backupId) . '/download', $query);
    }

    /**
     * @generated GET /services/[id]/backups/prune
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function backups_prune(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/backups/prune', $query);
    }

    /**
     * @generated POST /services/[id]/backups/prune
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_backups_prune(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/backups/prune', $body);
    }

    /**
     * @generated GET /services/[id]/backups/prune/[jobId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_backups_prune(string $id, string $jobId, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/backups/prune/' . self::encode($jobId), $query);
    }

    /**
     * @generated GET /services/[id]/bandwidth-usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function bandwidth_usage(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/bandwidth-usage', $query);
    }

    /**
     * @generated GET /services/[id]/billing-cycles
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function billing_cycles(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/billing-cycles', $query);
    }

    /**
     * @generated GET /services/[id]/console
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function console(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/console', $query);
    }

    /**
     * @generated POST /services/[id]/console
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_console(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/console', $body);
    }

    /**
     * @generated POST /services/[id]/console/command
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function console_command(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/console/command', $body);
    }

    /**
     * @generated GET /services/[id]/console/embed
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function console_embed(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/console/embed', $query);
    }

    /**
     * @generated GET /services/[id]/console/stream
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function console_stream(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/console/stream', $query);
    }

    /**
     * @generated POST /services/[id]/content/install
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function content_install(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/content/install', $body);
    }

    /**
     * @generated GET /services/[id]/content/jobs
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function content_jobs(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/content/jobs', $query);
    }

    /**
     * @generated GET /services/[id]/content/jobs/[jobId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_content_jobs(string $id, string $jobId, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/content/jobs/' . self::encode($jobId), $query);
    }

    /**
     * @generated GET /services/[id]/content/projects/[projectId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function content_projects(string $id, string $projectId, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/content/projects/' . self::encode($projectId), $query);
    }

    /**
     * @generated GET /services/[id]/content/search
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function content_search(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/content/search', $query);
    }

    /**
     * @generated GET /services/[id]/content/sources
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function content_sources(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/content/sources', $query);
    }

    /**
     * @generated GET /services/[id]/contract-documents
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function contract_documents(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/contract-documents', $query);
    }

    /**
     * @generated GET /services/[id]/contract-documents/[filename]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_contract_documents(string $id, string $filename, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/contract-documents/' . self::encode($filename), $query);
    }

    /**
     * @generated GET /services/[id]/datacenter/cabling
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function datacenter_cabling(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/datacenter/cabling', $query);
    }

    /**
     * @generated GET /services/[id]/datacenter/devices
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function datacenter_devices(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/datacenter/devices', $query);
    }

    /**
     * @generated POST /services/[id]/datacenter/devices
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_datacenter_devices(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/datacenter/devices', $body);
    }

    /**
     * @generated DELETE /services/[id]/datacenter/devices/[deviceId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_datacenter_devices(string $id, string $deviceId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/datacenter/devices/' . self::encode($deviceId), $query, $body);
    }

    /**
     * @generated PATCH /services/[id]/datacenter/devices/[deviceId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_datacenter_devices(string $id, string $deviceId, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/datacenter/devices/' . self::encode($deviceId), $body);
    }

    /**
     * @generated GET /services/[id]/datacenter/rack
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function datacenter_rack(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/datacenter/rack', $query);
    }

    /**
     * @generated GET /services/[id]/disk-usage
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function disk_usage(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/disk-usage', $query);
    }

    /**
     * @generated POST /services/[id]/domain/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function domain_withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/domain/withdraw', $body);
    }

    /**
     * @generated GET /services/[id]/eggs
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function eggs(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/eggs', $query);
    }

    /**
     * @generated GET /services/[id]/features
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function features(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/features', $query);
    }

    /**
     * @generated GET /services/[id]/files
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function files(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/files', $query);
    }

    /**
     * @generated POST /services/[id]/files
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_files(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/files', $body);
    }

    /**
     * @generated GET /services/[id]/firewall
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function firewall(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/firewall', $query);
    }

    /**
     * @generated POST /services/[id]/firewall
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_firewall(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/firewall', $body);
    }

    /**
     * @generated DELETE /services/[id]/firewall/[ruleId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_firewall(string $id, string $ruleId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/firewall/' . self::encode($ruleId), $query, $body);
    }

    /**
     * @generated PATCH /services/[id]/firewall/[ruleId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_firewall(string $id, string $ruleId, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/firewall/' . self::encode($ruleId), $body);
    }

    /**
     * @generated GET /services/[id]/game-auth
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function game_auth(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/game-auth', $query);
    }

    /**
     * @generated POST /services/[id]/game-auth
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_game_auth(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/game-auth', $body);
    }

    /**
     * @generated GET /services/[id]/game/eula
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function game_eula(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/game/eula', $query);
    }

    /**
     * @generated POST /services/[id]/game/eula
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_game_eula(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/game/eula', $body);
    }

    /**
     * @generated DELETE /services/[id]/ips/cancel
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_ips_cancel(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/ips/cancel', $query, $body);
    }

    /**
     * @generated POST /services/[id]/ips/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function ips_cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/ips/cancel', $body);
    }

    /**
     * @generated GET /services/[id]/keyhelp/credentials
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function keyhelp_credentials(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/keyhelp/credentials', $query);
    }

    /**
     * @generated POST /services/[id]/keyhelp/credentials
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_keyhelp_credentials(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/keyhelp/credentials', $body);
    }

    /**
     * @generated GET /services/[id]/keyhelp/domains
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function keyhelp_domains(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/keyhelp/domains', $query);
    }

    /**
     * @generated POST /services/[id]/keyhelp/domains
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_keyhelp_domains(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/keyhelp/domains', $body);
    }

    /**
     * @generated POST /services/[id]/keyhelp/reset
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function keyhelp_reset(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/keyhelp/reset', $body);
    }

    /**
     * @generated GET /services/[id]/keyhelp/setup
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function keyhelp_setup(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/keyhelp/setup', $query);
    }

    /**
     * @generated POST /services/[id]/keyhelp/setup
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_keyhelp_setup(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/keyhelp/setup', $body);
    }

    /**
     * @generated GET /services/[id]/labels
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function labels(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/labels', $query);
    }

    /**
     * @generated POST /services/[id]/labels
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_labels(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/labels', $body);
    }

    /**
     * @generated DELETE /services/[id]/labels/[labelId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_labels(string $id, string $labelId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/labels/' . self::encode($labelId), $query, $body);
    }

    /**
     * @generated PATCH /services/[id]/labels/[labelId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_labels(string $id, string $labelId, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/labels/' . self::encode($labelId), $body);
    }

    /**
     * @generated PUT /services/[id]/labels/assignments
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_labels_assignments(string $id, ?array $body = null): array
    {
        return parent::requestPut('/services/' . self::encode($id) . '/labels/assignments', $body);
    }

    /**
     * @generated DELETE /services/[id]/mail/aliases
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_mail_aliases(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/mail/aliases', $query, $body);
    }

    /**
     * @generated GET /services/[id]/mail/aliases
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function mail_aliases(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/mail/aliases', $query);
    }

    /**
     * @generated POST /services/[id]/mail/aliases
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_mail_aliases(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/mail/aliases', $body);
    }

    /**
     * @generated GET /services/[id]/mail/dns-zones
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function mail_dns_zones(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/mail/dns-zones', $query);
    }

    /**
     * @generated DELETE /services/[id]/mail/domains
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_mail_domains(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/mail/domains', $query, $body);
    }

    /**
     * @generated GET /services/[id]/mail/domains
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function mail_domains(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/mail/domains', $query);
    }

    /**
     * @generated POST /services/[id]/mail/domains
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_mail_domains(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/mail/domains', $body);
    }

    /**
     * @generated POST /services/[id]/mail/domains/apply-dns
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function mail_domains_apply_dns(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/mail/domains/apply-dns', $body);
    }

    /**
     * @generated GET /services/[id]/mail/domains/dns
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function mail_domains_dns(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/mail/domains/dns', $query);
    }

    /**
     * @generated POST /services/[id]/mail/domains/verify-dns
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function mail_domains_verify_dns(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/mail/domains/verify-dns', $body);
    }

    /**
     * @generated DELETE /services/[id]/mail/mailboxes
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_mail_mailboxes(string $id, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/mail/mailboxes', $query, $body);
    }

    /**
     * @generated GET /services/[id]/mail/mailboxes
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function mail_mailboxes(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/mail/mailboxes', $query);
    }

    /**
     * @generated PATCH /services/[id]/mail/mailboxes
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_mail_mailboxes(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/mail/mailboxes', $body);
    }

    /**
     * @generated POST /services/[id]/mail/mailboxes
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_mail_mailboxes(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/mail/mailboxes', $body);
    }

    /**
     * @generated GET /services/[id]/metrics
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function metrics(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/metrics', $query);
    }

    /**
     * @generated GET /services/[id]/monitoring/config
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring_config(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/monitoring/config', $query);
    }

    /**
     * @generated PATCH /services/[id]/monitoring/config
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_monitoring_config(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/monitoring/config', $body);
    }

    /**
     * @generated GET /services/[id]/monitoring/history
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring_history(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/monitoring/history', $query);
    }

    /**
     * @generated POST /services/[id]/monitoring/push/device-token
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function monitoring_push_device_token(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/monitoring/push/device-token', $body);
    }

    /**
     * @generated GET /services/[id]/monitoring/push/public-key
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring_push_public_key(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/monitoring/push/public-key', $query);
    }

    /**
     * @generated POST /services/[id]/monitoring/push/subscribe
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function monitoring_push_subscribe(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/monitoring/push/subscribe', $body);
    }

    /**
     * @generated GET /services/[id]/monitoring/score
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring_score(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/monitoring/score', $query);
    }

    /**
     * @generated GET /services/[id]/monitoring/targets
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function monitoring_targets(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/monitoring/targets', $query);
    }

    /**
     * @generated POST /services/[id]/monitoring/targets
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_monitoring_targets(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/monitoring/targets', $body);
    }

    /**
     * @generated DELETE /services/[id]/monitoring/targets/[targetId]
     * @param array<string, scalar|null>|null $query
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function delete_monitoring_targets(string $id, string $targetId, ?array $query = null, ?array $body = null): array
    {
        return parent::requestDelete('/services/' . self::encode($id) . '/monitoring/targets/' . self::encode($targetId), $query, $body);
    }

    /**
     * @generated PATCH /services/[id]/monitoring/targets/[targetId]
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_monitoring_targets(string $id, string $targetId, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/monitoring/targets/' . self::encode($targetId), $body);
    }

    /**
     * @generated GET /services/[id]/notifications
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function notifications(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/notifications', $query);
    }

    /**
     * @generated GET /services/[id]/players
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function players(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/players', $query);
    }

    /**
     * @generated POST /services/[id]/players/action
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function players_action(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/players/action', $body);
    }

    /**
     * @generated POST /services/[id]/plesk/reset
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function plesk_reset(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/plesk/reset', $body);
    }

    /**
     * @generated GET /services/[id]/plesk/setup
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function plesk_setup(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/plesk/setup', $query);
    }

    /**
     * @generated POST /services/[id]/plesk/setup
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_plesk_setup(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/plesk/setup', $body);
    }

    /**
     * @generated POST /services/[id]/reinstall
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function reinstall(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/reinstall', $body);
    }

    /**
     * @generated POST /services/[id]/renew
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function renew(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/renew', $body);
    }

    /**
     * @generated GET /services/[id]/settings
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function settings(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/settings', $query);
    }

    /**
     * @generated PATCH /services/[id]/settings
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_settings(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/settings', $body);
    }

    /**
     * @generated POST /services/[id]/settings
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_settings(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/settings', $body);
    }

    /**
     * @generated PUT /services/[id]/settings
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_settings(string $id, ?array $body = null): array
    {
        return parent::requestPut('/services/' . self::encode($id) . '/settings', $body);
    }

    /**
     * @generated GET /services/[id]/sftp
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sftp(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/sftp', $query);
    }

    /**
     * @generated POST /services/[id]/sftp/ensure-password
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sftp_ensure_password(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sftp/ensure-password', $body);
    }

    /**
     * @generated POST /services/[id]/sftp/rotate-password
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sftp_rotate_password(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sftp/rotate-password', $body);
    }

    /**
     * @generated GET /services/[id]/sla
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sla(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/sla', $query);
    }

    /**
     * @generated POST /services/[id]/sla
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_sla(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla', $body);
    }

    /**
     * @generated POST /services/[id]/sla/accept
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_accept(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/accept', $body);
    }

    /**
     * @generated POST /services/[id]/sla/amend
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_amend(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/amend', $body);
    }

    /**
     * @generated POST /services/[id]/sla/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/cancel', $body);
    }

    /**
     * @generated POST /services/[id]/sla/decline
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_decline(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/decline', $body);
    }

    /**
     * @generated GET /services/[id]/sla/documents/[docId]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function sla_documents(string $id, string $docId, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/sla/documents/' . self::encode($docId), $query);
    }

    /**
     * @generated POST /services/[id]/sla/revoke-cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_revoke_cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/revoke-cancel', $body);
    }

    /**
     * @generated POST /services/[id]/sla/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function sla_withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/sla/withdraw', $body);
    }

    /**
     * @generated GET /services/[id]/startup-variables
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function startup_variables(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/startup-variables', $query);
    }

    /**
     * @generated PATCH /services/[id]/startup-variables
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_startup_variables(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/startup-variables', $body);
    }

    /**
     * @generated PUT /services/[id]/startup-variables
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_startup_variables(string $id, ?array $body = null): array
    {
        return parent::requestPut('/services/' . self::encode($id) . '/startup-variables', $body);
    }

    /**
     * @generated GET /services/[id]/status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function status(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/status', $query);
    }

    /**
     * @generated GET /services/[id]/subscription
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function subscription(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/subscription', $query);
    }

    /**
     * @generated POST /services/[id]/subscription/accelerate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscription_accelerate(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/subscription/accelerate', $body);
    }

    /**
     * @generated PATCH /services/[id]/subscription/autopay
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_subscription_autopay(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/subscription/autopay', $body);
    }

    /**
     * @generated PATCH /services/[id]/subscription/billing-address
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_subscription_billing_address(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/subscription/billing-address', $body);
    }

    /**
     * @generated POST /services/[id]/subscription/cancel
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscription_cancel(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/subscription/cancel', $body);
    }

    /**
     * @generated POST /services/[id]/subscription/extend
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscription_extend(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/subscription/extend', $body);
    }

    /**
     * @generated PATCH /services/[id]/subscription/interval
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_subscription_interval(string $id, ?array $body = null): array
    {
        return parent::requestPatch('/services/' . self::encode($id) . '/subscription/interval', $body);
    }

    /**
     * @generated POST /services/[id]/subscription/reactivate
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscription_reactivate(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/subscription/reactivate', $body);
    }

    /**
     * @generated POST /services/[id]/subscription/withdraw
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function subscription_withdraw(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/subscription/withdraw', $body);
    }

    /**
     * @generated GET /services/[id]/teamspeak
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function teamspeak(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/teamspeak', $query);
    }

    /**
     * @generated POST /services/[id]/teamspeak
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_teamspeak(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/teamspeak', $body);
    }

    /**
     * @generated GET /services/[id]/templates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function templates(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/templates', $query);
    }

    /**
     * @generated GET /services/[id]/top-ips
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function top_ips(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/top-ips', $query);
    }

    /**
     * @generated GET /services/[id]/traffic
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function traffic(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/traffic', $query);
    }

    /**
     * @generated GET /services/[id]/upgrade
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function upgrade(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/upgrade', $query);
    }

    /**
     * @generated POST /services/[id]/upgrade
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_upgrade(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/upgrade', $body);
    }

    /**
     * @generated POST /services/[id]/upgrade-preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function upgrade_preview(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/upgrade-preview', $body);
    }

    /**
     * @generated GET /services/[id]/usage-export
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function usage_export(string $id, ?array $query = null): array
    {
        return parent::requestGet('/services/' . self::encode($id) . '/usage-export', $query);
    }

    /**
     * @generated POST /services/[id]/usage-export
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_usage_export(string $id, ?array $body = null): array
    {
        return parent::requestPost('/services/' . self::encode($id) . '/usage-export', $body);
    }
    // </generated-openapi>
}
