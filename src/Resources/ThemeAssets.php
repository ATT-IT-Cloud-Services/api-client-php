<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class ThemeAssets extends ResourceClient
{
    /**
     * @generated GET /theme-assets/[slug]/[...file]
     * @param array<string, scalar|null>|null $query
     * @return array<string, mixed>
     */
    public function find(string $slug, string $file, ?array $query = null): array
    {
        return parent::requestGet('/theme-assets/' . self::encode($slug) . '/' . ltrim($file, '/'), $query);
    }
}
