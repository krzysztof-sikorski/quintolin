<?php

declare(strict_types=1);

namespace App\Contract;

enum CacheKey: string
{
    case APPLICATION_VERSION = 'app.version';
}
