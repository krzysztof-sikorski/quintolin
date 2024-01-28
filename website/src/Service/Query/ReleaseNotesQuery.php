<?php

declare(strict_types=1);

namespace App\Service\Query;

use Quintolin\Storage\QueryResult\ReleaseNote;

final readonly class ReleaseNotesQuery extends AbstractReleaseNotesQuery
{
    /**
     * @return ReleaseNote[]
     */
    public function __invoke(): array
    {
        return $this->fetch(maxCount: null);
    }
}
