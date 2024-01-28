<?php

declare(strict_types=1);

namespace Quintolin\Storage\Repository;

use DateTimeImmutable;
use Quintolin\Storage\QueryResult\ReleaseNote;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

use function sprintf;

final readonly class ReleaseNoteRepository
{
    public function __construct(
        private string $projectDir,
    ) {}

    /**
     * @return ReleaseNote[]
     */
    public function fetch(null | int $maxCount): array
    {
        $finder = new Finder();
        $finder->in(dirs: [$this->projectDir]);
        $finder->files();
        $finder->name(patterns: ['*.html']);
        $finder->sortByName();
        $finder->reverseSorting();

        $notes = [];
        $total = 0;
        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $dateStr = $file->getBasename(suffix: '.html');
            $createdAt = DateTimeImmutable::createFromFormat('!Y-m-d', $dateStr);
            if ($createdAt instanceof DateTimeImmutable) {
                $id = sprintf('%d000', $createdAt->getTimestamp());
                $notes[] = new ReleaseNote(id: $id, createdAt: $createdAt, htmlContent: $file->getContents());
                ++$total;
            }
            if ($maxCount > 0 && $total >= $maxCount) {
                break;
            }
        }

        return $notes;
    }
}
