<?php

declare(strict_types=1);

namespace Quintolin\Storage\QueryResult;

use DateTimeImmutable;

final readonly class ReleaseNote
{
    public DateTimeImmutable $createdAt;

    public function __construct(
        public string $id,
        DateTimeImmutable $createdAt,
        public string $htmlContent,
    ) {
        $this->createdAt = DateTimeImmutable::createFromInterface(object: $createdAt);
    }
}
