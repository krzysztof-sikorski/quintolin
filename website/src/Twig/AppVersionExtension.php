<?php

declare(strict_types=1);

namespace App\Twig;

use App\Service\VersionReader;
use Override;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class AppVersionExtension extends AbstractExtension
{
    public function __construct(
        private VersionReader $versionReader,
    ) {}

    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_version', [$this, 'getVersion']),
        ];
    }

    public function getVersion(): string
    {
        return ($this->versionReader)();
    }
}
