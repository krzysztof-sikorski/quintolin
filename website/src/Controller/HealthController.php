<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\VersionReader;
use Quintolin\Core\HealthCheck as CoreHealthCheck;
use Quintolin\Storage\HealthCheck as StorageHealthCheck;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route(path: '/health', name: 'app_health', methods: [Request::METHOD_GET])]
final readonly class HealthController
{
    public function __construct(
        private VersionReader $versionReader,
    ) {}

    public function __invoke(): Response
    {
        $coreChecker = new CoreHealthCheck();
        $storageChecker = new StorageHealthCheck();

        return new JsonResponse(data: [
            'version' => ($this->versionReader)(),
            'core' => $coreChecker(),
            'storage' => $storageChecker(),
        ]);
    }
}
