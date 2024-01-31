<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use App\Service\VersionReader;
use Override;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class AppExtension extends AbstractExtension
{
    public function __construct(
        private VersionReader $versionReader,
    ) {}

    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_version', $this->getAppVersion(...)),
        ];
    }

    public function getAppVersion(): string
    {
        return ($this->versionReader)();
    }
}
