<?php

declare(strict_types=1);

namespace App\Controller\Website;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/sotg/2015-07-17', name: 'app_state_of_the_game', methods: [Request::METHOD_GET])]
#[Template(template: 'website/state_of_the_game.html.twig')]
final readonly class StateOfTheGameController
{
    public function __invoke(): array
    {
        return [];
    }
}
