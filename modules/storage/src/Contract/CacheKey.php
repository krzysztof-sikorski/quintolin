<?php

declare(strict_types=1);

namespace Quintolin\Storage\Contract;

enum CacheKey: string
{
    case RELEASE_NOTES = 'app.storage.release_notes';
}
