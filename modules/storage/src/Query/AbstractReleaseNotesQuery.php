<?php

declare(strict_types=1);

namespace Quintolin\Storage\Query;

use Quintolin\Storage\Repository\ReleaseNoteRepository;

abstract readonly class AbstractReleaseNotesQuery
{
    public function __construct(
        protected ReleaseNoteRepository $repository,
    ) {}
}
