<?php

declare(strict_types=1);

namespace Ignite\ApiClient;

enum ClientKind: string
{
    case Desktop = 'desktop';
    case Mobile = 'mobile';
    case Api = 'api';
}
