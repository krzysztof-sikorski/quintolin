<?php

declare(strict_types=1);

namespace App\Controller\Website;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route('/updates', name: 'app_release_notes', methods: [Request::METHOD_GET])]
#[Template(template: 'website/release_notes.html.twig')]
final readonly class ReleaseNotesController
{
    public function __invoke(): array
    {
        return [];
    }
}
