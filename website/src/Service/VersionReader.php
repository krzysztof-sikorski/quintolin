<?php

declare(strict_types=1);

namespace App\Service;

use App\Contract\CacheKey;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Process\Process;

use function trim;

final class VersionReader
{
    public function __construct(
        private CacheItemPoolInterface $cacheItemPool,
    ) {}

    public function __invoke(): string
    {
        $cacheKey = CacheKey::APPLICATION_VERSION->value;
        $cacheItem = $this->cacheItemPool->getItem(key: $cacheKey);

        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $version = $this->fetch();

        $cacheItem->set(value: $version);
        $this->cacheItemPool->save($cacheItem);

        return $version;
    }

    private function fetch(): string
    {
        $process = new Process(command: ['git', 'describe', '--always']);
        $process->run();
        return trim(string: $process->getOutput());
    }
}
