<?php

declare(strict_types=1);

namespace App\Service\Query;

use Quintolin\Storage\QueryResult\ReleaseNote;

final readonly class LatestReleaseNoteQuery extends AbstractReleaseNotesQuery
{
    public function __invoke(): null | ReleaseNote
    {
        $notes = $this->fetch(maxCount: 1);
        return $notes[0] ?? null;
    }
}
