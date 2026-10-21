<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

final class ExtractErrorCode
{
    /** @param array<string, mixed> $data */
    public static function extract(array $data): ?string
    {
        if (isset($data['errorCode']) && is_string($data['errorCode'])) {
            $code = trim($data['errorCode']);
            if ($code !== '') {
                return $code;
            }
        }

        if (isset($data['error']) && is_string($data['error'])) {
            $code = trim($data['error']);
            if ($code !== '') {
                return $code;
            }
        }

        if (isset($data['message']) && is_string($data['message'])) {
            $message = trim($data['message']);
            if ($message === 'unauthenticated') {
                return 'unauthenticated';
            }
            if ($message !== '') {
                return $message;
            }
        }

        return null;
    }
}
