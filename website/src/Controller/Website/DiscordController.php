<?php

declare(strict_types=1);

namespace App\Controller\Website;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/discord', name: 'app_website_discord', methods: [Request::METHOD_GET])]
#[Template(template: 'website/discord.html.twig')]
final readonly class DiscordController
{
    public function __invoke(): array
    {
        return [];
    }
}
