<?php

declare(strict_types=1);

namespace App\Controller;

use Quintolin\Core\HealthCheck;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/health', name: 'app_health', methods: [Request::METHOD_GET])]
final readonly class HealthController
{
    public function __invoke(): Response
    {
        $checker = new HealthCheck();
        return new JsonResponse(data: ['result' => $checker()]);
    }
}
