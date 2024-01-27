<?php

declare(strict_types=1);

namespace App\Service\Query;

use App\DTO\QueryResult\ReleaseNote;

final readonly class LatestReleaseNoteQuery extends AbstractReleaseNotesQuery
{
    public function __invoke(): ReleaseNote
    {
        $notes = $this->fetch(maxCount: 1);
        return $notes[0];
    }
}
