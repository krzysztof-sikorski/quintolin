<?php

declare(strict_types=1);

namespace App\Twig;

use ValueError;

use function array_key_exists;

/**
 * Container for additional global data in Twig templates.
 */
final class PageContext
{
    private array $path = [
        'root' => 'Shintolin',
        'page' => null,
        'item' => null,
    ];
    private null | string $assetsEntryPoint = null;

    public function getPath(): array
    {
        return $this->path;
    }

    public function setPathFragment(string $key, string $value): void
    {
        if (false === array_key_exists(key: $key, array: $this->path)) {
            throw new ValueError("Invalid key: {$key}");
        }
        $this->path[$key] = $value;
    }

    public function getAssetsEntryPoint(): null | string
    {
        return $this->assetsEntryPoint;
    }

    public function setAssetsEntryPoint(null | string $value): void
    {
        $this->assetsEntryPoint = $value;
    }
}
