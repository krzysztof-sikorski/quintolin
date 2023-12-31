<?php

declare(strict_types=1);

namespace App\Controller\Website;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route('/', name: 'app_home', methods: [Request::METHOD_GET])]
#[Template(template: 'website/home.html.twig')]
final readonly class HomeController
{
    public function __construct(
        private ClockInterface $clock,
    ) {}

    public function __invoke(): array
    {
        // TODO fetch real data
        return [
            ...$this->getSampleData(),
            'currentTime' => $this->clock->now(),
        ];
    }

    /**
     * Sample data copied from Wayback Machine snapshots.
     *
     * @see https://web.archive.org/web/20210924115620/https://www.shintolin.com/
     */
    private function getSampleData(): array
    {
        return [
            'activePlayersCount' => 14,
            'activeSettlementsCount' => 7,
            'tileCount' => 10070,
            'newestPlayer' => [
                'url' => '/profile/artya',
                'name' => 'Artya',
            ],
            'startingSettlements' => [
                ['slug' => 'meadow-camp', 'name' => 'Meadow Camp'],
                ['slug' => 'sietch-tabr', 'name' => 'Sietch Tabr'],
                ['slug' => 'the-chaulmoogra-federation', 'name' => 'The Chaulmoogra Federation'],
            ],
            'latestReleaseNote' => [
                'createdAt' => new DateTimeImmutable('2017-09-12 UTC'),
                'contentAsHtml' => <<<'EOF'
                    <ul>
                    <li>Fixed a bug preventing characters from attacking buildings within their own settlement.
                        Hat tip to Grixic and Juraz.</li>
                    <li>Fixed bug preventing provisional settlement members from being kicked when dazed.
                        Hat tip to Clary.</li>
                    <li>Moved the “Kick to Outside” action to the Building tab.</li>
                    <li>Added new action to allow settlement leader to kick any dazed player from their settlement.
                        This action is only available at the totem pole.</li>
                    </ul>
                    EOF,
            ],
        ];
    }
}
