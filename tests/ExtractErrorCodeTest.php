<?php

declare(strict_types=1);

namespace Ignite\ApiClient\Tests;

use Ignite\ApiClient\ApiException;
use Ignite\ApiClient\ErrorCodes;
use Ignite\ApiClient\ExtractErrorCode;
use PHPUnit\Framework\TestCase;

final class ExtractErrorCodeTest extends TestCase
{
    public function testExtractPrefersErrorCodeField(): void
    {
        $this->assertSame(
            'invoiceNotFound',
            ExtractErrorCode::extract(['errorCode' => 'invoiceNotFound']),
        );
    }

    public function testExtractUnauthenticatedMessage(): void
    {
        $this->assertSame(
            'unauthenticated',
            ExtractErrorCode::extract(['message' => 'unauthenticated']),
        );
    }

    public function testApiExceptionFromResponseUsesUnknownFallback(): void
    {
        $exception = ApiException::fromResponse(500, []);

        $this->assertSame(ErrorCodes::API_ERROR_UNKNOWN, $exception->errorCode);
        $this->assertSame(500, $exception->status);
    }
}
