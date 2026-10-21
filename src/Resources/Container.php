<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class Container extends ResourceClient
{
    /**
     * @generated GET /container/access
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function access(?array $query = null): array
    {
        return parent::requestGet('/container/access', $query);
    }

    /**
     * @generated GET /container/projects
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects(?array $query = null): array
    {
        return parent::requestGet('/container/projects', $query);
    }

    /**
     * @generated POST /container/projects
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects(?array $body = null): array
    {
        return parent::requestPost('/container/projects', $body);
    }

    /**
     * @generated GET /container/projects/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_projects(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/projects/' . self::encode($id), $query);
    }

    /**
     * @generated POST /container/projects/[id]/domains
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_domains(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/domains', $body);
    }

    /**
     * @generated POST /container/projects/[id]/import
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_import(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/import', $body);
    }

    /**
     * @generated POST /container/projects/[id]/networks
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_networks(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/networks', $body);
    }

    /**
     * @generated POST /container/projects/[id]/ports
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_ports(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/ports', $body);
    }

    /**
     * @generated GET /container/projects/[id]/templates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function projects_templates(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/projects/' . self::encode($id) . '/templates', $query);
    }

    /**
     * @generated POST /container/projects/[id]/templates
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_projects_templates(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/templates', $body);
    }

    /**
     * @generated POST /container/projects/[id]/workloads
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function projects_workloads(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/projects/' . self::encode($id) . '/workloads', $body);
    }

    /**
     * @generated GET /container/regions
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function regions(?array $query = null): array
    {
        return parent::requestGet('/container/regions', $query);
    }

    /**
     * @generated GET /container/workloads/[id]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function workloads(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/workloads/' . self::encode($id), $query);
    }

    /**
     * @generated POST /container/workloads/[id]/actions
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function workloads_actions(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/workloads/' . self::encode($id) . '/actions', $body);
    }

    /**
     * @generated GET /container/workloads/[id]/env
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function workloads_env(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/workloads/' . self::encode($id) . '/env', $query);
    }

    /**
     * @generated PUT /container/workloads/[id]/env
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_workloads_env(string $id, ?array $body = null): array
    {
        return parent::requestPut('/container/workloads/' . self::encode($id) . '/env', $body);
    }

    /**
     * @generated GET /container/workloads/[id]/files
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function workloads_files(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/workloads/' . self::encode($id) . '/files', $query);
    }

    /**
     * @generated POST /container/workloads/[id]/files
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_workloads_files(string $id, ?array $body = null): array
    {
        return parent::requestPost('/container/workloads/' . self::encode($id) . '/files', $body);
    }

    /**
     * @generated GET /container/workloads/[id]/logs
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function workloads_logs(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/workloads/' . self::encode($id) . '/logs', $query);
    }

    /**
     * @generated GET /container/workloads/[id]/monitoring
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function workloads_monitoring(string $id, ?array $query = null): array
    {
        return parent::requestGet('/container/workloads/' . self::encode($id) . '/monitoring', $query);
    }
}
