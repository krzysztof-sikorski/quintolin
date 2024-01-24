<?php

declare(strict_types=1);

namespace App\Service\Query;

use App\DTO\QueryResult\ReleaseNote;
use DateTimeImmutable;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

use function sprintf;

final readonly class ReleaseNotesQuery
{
    public function __construct(
        #[Autowire('%kernel.project_dir%/data/release-notes')]
        private string $projectDir,
    ) {}

    /**
     * @return ReleaseNote[]
     */
    public function __invoke(null | int $maxCount = null): array
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
