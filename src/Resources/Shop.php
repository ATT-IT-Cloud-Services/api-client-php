<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

use Ignite\ApiClient\Models\CountriesResponse;
use Ignite\ApiClient\Models\ProductsResponse;

final class Shop extends ResourceClient
{
    public function products(?string $lang = null): ProductsResponse
    {
        $query = $lang !== null ? ['lang' => $lang] : null;

        return ProductsResponse::fromArray($this->requestGet('/products', $query));
    }

    public function countries(): CountriesResponse
    {
        return CountriesResponse::fromArray($this->requestGet('/public/countries'));
    }

    // <generated-openapi>
    /**
     * @generated GET /categories/[id]/upgrade-config
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function upgrade_config(string $id, ?array $query = null): array
    {
        return parent::requestGet('/categories/' . self::encode($id) . '/upgrade-config', $query);
    }

    /**
     * @generated GET /products/[category]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $category, ?array $query = null): array
    {
        return parent::requestGet('/products/' . self::encode($category), $query);
    }

    /**
     * @generated GET /products/[category]/[product]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_find(string $category, string $product, ?array $query = null): array
    {
        return parent::requestGet('/products/' . self::encode($category) . '/' . self::encode($product), $query);
    }

    /**
     * @generated GET /products/[category]/[product]/view
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function view(string $category, string $product, ?array $query = null): array
    {
        return parent::requestGet('/products/' . self::encode($category) . '/' . self::encode($product) . '/view', $query);
    }

    /**
     * @generated GET /products/[category]/view
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function get_view(string $category, ?array $query = null): array
    {
        return parent::requestGet('/products/' . self::encode($category) . '/view', $query);
    }

    /**
     * @generated GET /products/by-slug/[slug]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function by_slug(string $slug, ?array $query = null): array
    {
        return parent::requestGet('/products/by-slug/' . self::encode($slug), $query);
    }

    /**
     * @generated GET /products/locations
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function locations(?array $query = null): array
    {
        return parent::requestGet('/products/locations', $query);
    }

    /**
     * @generated POST /products/proxmox-slot-preview
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function proxmox_slot_preview(?array $body = null): array
    {
        return parent::requestPost('/products/proxmox-slot-preview', $body);
    }

    /**
     * @generated GET /products/templates
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function templates(?array $query = null): array
    {
        return parent::requestGet('/products/templates', $query);
    }
    // </generated-openapi>
}
