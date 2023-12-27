<?php

namespace Comment\Domain\Data;

use Spatie\LaravelData\Data;

class CommentUserData extends Data
{
    public function __construct(
        public readonly int $userId,
    ){}

    public static function fromData(): self
    {
        return new static(
            userId: 1
        );
    }
}
