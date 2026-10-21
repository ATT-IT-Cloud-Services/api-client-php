<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\DashboardTicketsResponse;
use Ignite\ApiClient\Models\MaintenanceNotificationsResponse;
use Ignite\ApiClient\Models\MonthlyOffersResponse;
use Ignite\ApiClient\Models\ServiceListResponse;
use Ignite\ApiClient\Models\TotalBandwidthResponse;
use Ignite\ApiClient\Models\TrafficSourcesResponse;

final class Dashboard extends ResourceClient
{
    public function services(int $limit): ServiceListResponse
    {
        return ServiceListResponse::fromArray($this->requestGet('/services', ['limit' => $limit]));
    }

    public function tickets(string $status, int $limit): DashboardTicketsResponse
    {
        return DashboardTicketsResponse::fromArray(
            $this->requestGet('/tickets', ['status' => $status, 'limit' => $limit]),
        );
    }

    public function total_bandwidth(): TotalBandwidthResponse
    {
        return TotalBandwidthResponse::fromArray($this->requestGet('/services/total-bandwidth'));
    }

    public function maintenance_notifications(): MaintenanceNotificationsResponse
    {
        return MaintenanceNotificationsResponse::fromArray(
            $this->requestGet('/services/maintenance-notifications'),
        );
    }

    public function traffic_sources(): TrafficSourcesResponse
    {
        return TrafficSourcesResponse::fromArray($this->requestGet('/dashboard/traffic-sources'));
    }

    public function monthly_offers(): MonthlyOffersResponse
    {
        return MonthlyOffersResponse::fromArray($this->requestGet('/user/monthly-offers'));
    }

    // <generated-openapi>
    /**
     * @generated GET /dashboard/contract-payment-alert
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function contract_payment_alert(?array $query = null): array
    {
        return parent::requestGet('/dashboard/contract-payment-alert', $query);
    }
    // </generated-openapi>
}
