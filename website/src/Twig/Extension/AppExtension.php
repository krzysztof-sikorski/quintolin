<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use App\Service\VersionReader;
use Override;
use Psr\Clock\ClockInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class AppExtension extends AbstractExtension
{
    public function __construct(
        private ClockInterface $clock,
        private VersionReader $versionReader,
    ) {}

    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_server_time', $this->getServerTime(...)),
            new TwigFunction('app_version', $this->getAppVersion(...)),
        ];
    }

    public function getServerTime(): \DateTimeImmutable
    {
        return $this->clock->now();
    }

    public function getAppVersion(): string
    {
        return ($this->versionReader)();
    }
}
