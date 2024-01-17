<?php

declare(strict_types=1);

namespace App\Twig;

use function array_filter;
use function implode;

/**
 * Container for configuring page title in Twig templates.
 */
final class PageTitle
{
    private string $separator = '';
    private null | string $item = null;
    private null | string $page = null;
    private null | string $root = null;
    private null | string $subtitle = null;

    public function __toString(): string
    {
        $parts = array_filter(
            array: [$this->item, $this->page, $this->root, $this->subtitle],
            callback: static fn(null | string $part) => null !== $part && '' !== $part,
        );
        return implode(separator: $this->separator, array: $parts);
    }

    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }

    public function setItem(null | string $item): void
    {
        $this->item = $item;
    }

    public function setPage(null | string $page): void
    {
        $this->page = $page;
    }

    public function setRoot(null | string $root): void
    {
        $this->root = $root;
    }

    public function setSubtitle(null | string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }
}
