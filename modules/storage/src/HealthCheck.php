<?php

declare(strict_types=1);

namespace Quintolin\Storage;

final class HealthCheck
{
    public function __invoke(): bool
    {
        return true;
    }
}
