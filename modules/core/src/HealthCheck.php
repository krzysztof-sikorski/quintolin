<?php

declare(strict_types=1);

namespace Quintolin\Core;

final class HealthCheck
{
    public function __invoke(): string
    {
        return self::class;
    }
}
