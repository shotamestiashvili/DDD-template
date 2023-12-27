<?php

namespace Post\Domain\Data;

use Spatie\LaravelData\Data;

class PostUserData extends Data
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
