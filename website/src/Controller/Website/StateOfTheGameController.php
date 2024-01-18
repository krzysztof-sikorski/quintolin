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
#[Route(path: '/sotg/{date}', name: self::ROUTE_NAME, methods: [Request::METHOD_GET])]
#[Template(template: 'website/state_of_the_game.html.twig')]
final readonly class StateOfTheGameController
{
    public const string ROUTE_NAME = 'app_website_state_of_the_game';
    private const string EXPECTED_DATE = '2015-07-17';

    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
    ) {}

    public function __invoke(null | string $date = null): array | RedirectResponse
    {
        if (null === $date) {
            $url = $this->urlGenerator->generate(name: self::ROUTE_NAME, parameters: ['date' => self::EXPECTED_DATE]);
            return new RedirectResponse(url: $url, status: Response::HTTP_FOUND);
        }
        return [];
    }
}
