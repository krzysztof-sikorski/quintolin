<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[AsController]
#[Route('/', name: 'app_home', methods: [Request::METHOD_GET])]
final readonly class HomeController
{
    public function __construct(private Environment $twig) {}

    public function __invoke(): Response
    {
        $content = $this->twig->render(name: 'home/index.html.twig');

        return new Response($content);
    }
}
