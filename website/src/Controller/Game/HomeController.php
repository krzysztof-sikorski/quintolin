<?php

declare(strict_types=1);

namespace App\Controller\Game;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/game', name: 'app_game_home', methods: [Request::METHOD_GET])]
#[Template(template: 'game/home.html.twig')]
final readonly class HomeController
{
    public function __invoke(): array
    {
        return [];
    }
}
