<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class PublicApi extends ResourceClient
{
    /**
     * @generated POST /public/abuse
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function abuse(?array $body = null): array
    {
        return parent::requestPost('/public/abuse', $body);
    }

    /**
     * @generated GET /public/appearance
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function appearance(?array $query = null): array
    {
        return parent::requestGet('/public/appearance', $query);
    }

    /**
     * @generated GET /public/appearance/assets/[key]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function appearance_assets(string $key, ?array $query = null): array
    {
        return parent::requestGet('/public/appearance/assets/' . self::encode($key), $query);
    }

    /**
     * @generated GET /public/blog
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function blog(?array $query = null): array
    {
        return parent::requestGet('/public/blog', $query);
    }

    /**
     * @generated GET /public/blog/[slug]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_blog(string $slug, ?array $query = null): array
    {
        return parent::requestGet('/public/blog/' . self::encode($slug), $query);
    }

    /**
     * @generated POST /public/cancellation
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function cancellation(?array $body = null): array
    {
        return parent::requestPost('/public/cancellation', $body);
    }

    /**
     * @generated POST /public/case-objection
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function case_objection(?array $body = null): array
    {
        return parent::requestPost('/public/case-objection', $body);
    }

    /**
     * @generated POST /public/case-report
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function case_report(?array $body = null): array
    {
        return parent::requestPost('/public/case-report', $body);
    }

    /**
     * @generated GET /public/case-status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function case_status(?array $query = null): array
    {
        return parent::requestGet('/public/case-status', $query);
    }

    /**
     * @generated POST /public/domains/starting-price
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function domains_starting_price(?array $body = null): array
    {
        return parent::requestPost('/public/domains/starting-price', $body);
    }

    /**
     * @generated GET /public/footer-proxy/status-availability
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function footer_proxy_status_availability(?array $query = null): array
    {
        return parent::requestGet('/public/footer-proxy/status-availability', $query);
    }

    /**
     * @generated GET /public/footer-proxy/status-pulse
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function footer_proxy_status_pulse(?array $query = null): array
    {
        return parent::requestGet('/public/footer-proxy/status-pulse', $query);
    }

    /**
     * @generated GET /public/legal/[doc]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function legal(string $doc, ?array $query = null): array
    {
        return parent::requestGet('/public/legal/' . self::encode($doc), $query);
    }

    /**
     * @generated GET /public/navigation
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function navigation(?array $query = null): array
    {
        return parent::requestGet('/public/navigation', $query);
    }

    /**
     * @generated GET /public/providers/[id]/catalog
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function providers_catalog(string $id, ?array $query = null): array
    {
        return parent::requestGet('/public/providers/' . self::encode($id) . '/catalog', $query);
    }

    /**
     * @generated GET /public/registration-status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function registration_status(?array $query = null): array
    {
        return parent::requestGet('/public/registration-status', $query);
    }

    /**
     * @generated POST /public/report-minor
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function report_minor(?array $body = null): array
    {
        return parent::requestPost('/public/report-minor', $body);
    }

    /**
     * @generated GET /public/reviews
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function reviews(?array $query = null): array
    {
        return parent::requestGet('/public/reviews', $query);
    }

    /**
     * @generated GET /public/setup
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function setup(?array $query = null): array
    {
        return parent::requestGet('/public/setup', $query);
    }

    /**
     * @generated PATCH /public/setup
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function update_setup(?array $body = null): array
    {
        return parent::requestPatch('/public/setup', $body);
    }

    /**
     * @generated GET /public/setup-status
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function setup_status(?array $query = null): array
    {
        return parent::requestGet('/public/setup-status', $query);
    }

    /**
     * @generated GET /public/setup/admin
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function setup_admin(?array $query = null): array
    {
        return parent::requestGet('/public/setup/admin', $query);
    }

    /**
     * @generated POST /public/setup/admin
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function post_setup_admin(?array $body = null): array
    {
        return parent::requestPost('/public/setup/admin', $body);
    }

    /**
     * @generated POST /public/setup/assets
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function setup_assets(?array $body = null): array
    {
        return parent::requestPost('/public/setup/assets', $body);
    }

    /**
     * @generated POST /public/setup/complete
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function setup_complete(?array $body = null): array
    {
        return parent::requestPost('/public/setup/complete', $body);
    }

    /**
     * @generated GET /public/setup/legal
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function setup_legal(?array $query = null): array
    {
        return parent::requestGet('/public/setup/legal', $query);
    }

    /**
     * @generated PUT /public/setup/legal
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function replace_setup_legal(?array $body = null): array
    {
        return parent::requestPut('/public/setup/legal', $body);
    }

    /**
     * @generated GET /public/support-hours
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function support_hours(?array $query = null): array
    {
        return parent::requestGet('/public/support-hours', $query);
    }

    /**
     * @generated GET /public/support-stats
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function support_stats(?array $query = null): array
    {
        return parent::requestGet('/public/support-stats', $query);
    }

    /**
     * @generated POST /public/takedown
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function takedown(?array $body = null): array
    {
        return parent::requestPost('/public/takedown', $body);
    }

    /**
     * @generated GET /public/tenant
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function tenant(?array $query = null): array
    {
        return parent::requestGet('/public/tenant', $query);
    }
}
