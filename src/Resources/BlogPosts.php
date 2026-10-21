<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Resources;

/** Generated from apps/backend/app/openapi.generated.json. */
final class BlogPosts extends ResourceClient
{
    /**
     * @generated POST /blog-posts/[slug]/vote
     * @param array<string, mixed>|null $body
     * @return array<string, mixed>
     */
    public function vote(string $slug, ?array $body = null): array
    {
        return parent::requestPost('/blog-posts/' . self::encode($slug) . '/vote', $body);
    }
}
