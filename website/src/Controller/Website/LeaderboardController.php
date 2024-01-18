<?php

declare(strict_types=1);

namespace App\Controller\Website;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsController]
#[Route(path: '/rankings/{metric}', name: self::ROUTE_NAME, methods: [Request::METHOD_GET])]
#[Template(template: 'website/leaderboard.html.twig')]
final readonly class LeaderboardController
{
    public const string ROUTE_NAME = 'app_website_leaderboard';
    private const string DEFAULT_METRIC = 'frags';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
    ) {}

    public function __invoke(null | string $metric = null): array | RedirectResponse
    {
        if (null === $metric) {
            $url = $this->urlGenerator->generate(
                name: self::ROUTE_NAME,
                parameters: ['metric' => self::DEFAULT_METRIC],
            );
            return new RedirectResponse(url: $url, status: Response::HTTP_FOUND);
        }

        return [
            'metric' => $metric,
        ];
    }
}
