<?php

declare(strict_types=1);

namespace App\Twig\Extension;

use App\Service\VersionReader;
use App\Twig\DTO\PageTitle;
use DateTimeImmutable;
use Override;
use Psr\Clock\ClockInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class AppExtension extends AbstractExtension
{
    private PageTitle $pageTitle;

    public function __construct(
        private ClockInterface $clock,
        private VersionReader $versionReader,
    ) {
        $this->pageTitle = new PageTitle();
    }

    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_server_time', $this->getServerTime(...)),
            new TwigFunction('app_version', $this->getAppVersion(...)),
            new TwigFunction('app_page_title', $this->getPageTitle(...)),
            new TwigFunction('app_set_page_title_separator', $this->setPageTitleSeparator(...)),
            new TwigFunction('app_set_page_title_item', $this->setPageTitleItem(...)),
            new TwigFunction('app_set_page_title_page', $this->setPageTitlePage(...)),
            new TwigFunction('app_set_page_title_world', $this->setPageTitleWorld(...)),
            new TwigFunction('app_set_page_title_root', $this->setPageTitleRoot(...)),
            new TwigFunction('app_set_page_title_subtitle', $this->setPageTitleSubtitle(...)),
        ];
    }

    public function getServerTime(): DateTimeImmutable
    {
        return $this->clock->now();
    }

    public function getAppVersion(): string
    {
        return ($this->versionReader)();
    }

    public function getPageTitle(): string
    {
        return (string) $this->pageTitle;
    }

    public function setPageTitleSeparator(string $separator): void
    {
        $this->pageTitle->setSeparator(separator: $separator);
    }

    public function setPageTitleItem(null | string $item): void
    {
        $this->pageTitle->setItem($item);
    }

    public function setPageTitlePage(null | string $page): void
    {
        $this->pageTitle->setPage(page: $page);
    }

    public function setPageTitleWorld(null | string $world): void
    {
        $this->pageTitle->setWorld(world: $world);
    }

    public function setPageTitleRoot(null | string $root): void
    {
        $this->pageTitle->setRoot(root: $root);
    }

    public function setPageTitleSubtitle(null | string $subtitle): void
    {
        $this->pageTitle->setSubtitle(subtitle: $subtitle);
    }
}
