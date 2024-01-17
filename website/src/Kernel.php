<?php

declare(strict_types=1);

namespace App;

use Override;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

use function date_default_timezone_set;
use function error_reporting;

use const E_ALL;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    #[Override]
    public function boot(): void
    {
        error_reporting(error_level: E_ALL);
        date_default_timezone_set(timezoneId: 'UTC');

        parent::boot();
    }
}
