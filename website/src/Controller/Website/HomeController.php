<?php

declare(strict_types=1);

namespace App\Controller\Website;

use App\Service\Query\LatestReleaseNoteQuery;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/', name: 'app_website_home', methods: [Request::METHOD_GET])]
#[Template(template: 'website/home.html.twig')]
final readonly class HomeController
{
    public function __construct(
        private LatestReleaseNoteQuery $query,
    ) {}

    public function __invoke(): array
    {
        return [
            'latestReleaseNote' => ($this->query)(),
            ...$this->getSampleData(), // TODO fetch real data
        ];
    }

    /**
     * Sample data based on Wayback Machine snapshots.
     *
     * @see https://web.archive.org/web/20210924115620/https://www.shintolin.com/
     */
    private function getSampleData(): array
    {
        return [
            'activeWorldCount' => 13,
            'activePlayerCount' => 14,
            'activeSettlementCount' => 7,
            'newestPlayer' => [
                'url' => '/profile/artya',
                'name' => 'Grzegorz Brzęczyszczykiewicz',
            ],
            'startingSettlements' => [
                ['slug' => 'meadow-camp', 'name' => 'Meadow Camp'],
                ['slug' => 'sietch-tabr', 'name' => 'Sietch Tabr'],
                ['slug' => 'the-chaulmoogra-federation', 'name' => 'The Chaulmoogra Federation'],
            ],
        ];
    }
}
