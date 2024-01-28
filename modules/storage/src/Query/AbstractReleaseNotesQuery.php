<?php

declare(strict_types=1);

namespace Quintolin\Storage\Query;

use Psr\Cache\CacheItemPoolInterface;
use Quintolin\Storage\Contract\CacheKey;
use Quintolin\Storage\QueryResult\ReleaseNote;
use Quintolin\Storage\Repository\ReleaseNoteRepository;

use function sprintf;

abstract readonly class AbstractReleaseNotesQuery
{
    public function __construct(
        protected ReleaseNoteRepository $repository,
        protected CacheItemPoolInterface $cacheItemPool,
    ) {}

    /**
     * @return ReleaseNote[]
     */
    protected function get(null | int $maxCount): array
    {
        $cacheKey = $this->getCacheKey(maxCount: $maxCount);
        $cacheItem = $this->cacheItemPool->getItem(key: $cacheKey);

        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $notes = $this->repository->fetch(maxCount: $maxCount);
        $cacheItem->set(value: $notes);
        $this->cacheItemPool->save($cacheItem);

        return $notes;
    }

    private function getCacheKey(null | int $maxCount): string
    {
        return sprintf(
            '%s_%s',
            CacheKey::RELEASE_NOTES->value,
            null !== $maxCount ? $maxCount : 'all',
        );
    }
}
