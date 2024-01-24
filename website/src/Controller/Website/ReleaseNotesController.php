<?php

declare(strict_types=1);

namespace App\Controller\Website;

use App\Service\Query\ReleaseNotesQuery;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/updates', name: 'app_website_release_notes', methods: [Request::METHOD_GET])]
#[Template(template: 'website/release_notes.html.twig')]
final readonly class ReleaseNotesController
{
    public function __construct(
        private ReleaseNotesQuery $query,
    ) {}

    public function __invoke(): array
    {
        return ['notes' => ($this->query)()];
    }
}
