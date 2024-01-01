<?php

declare(strict_types=1);

namespace App\Controller\Website;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route('/', name: 'app_home', methods: [Request::METHOD_GET])]
#[Template(template: 'website/home.html.twig')]
final readonly class HomeController
{
    public function __invoke(): array
    {
        return [];
    }
}
