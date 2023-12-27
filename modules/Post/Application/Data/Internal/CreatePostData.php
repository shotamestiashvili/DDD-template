<?php

namespace Post\Application\Data\Internal;

use Post\Domain\Enums\StatusEnums;
use Spatie\LaravelData\Data;

class CreatePostData extends Data
{
    public function __construct(
        public readonly int $userId,
        public readonly string $title,
        public readonly string $text,
        public readonly int $like,
        public readonly string $status,
    )
    {
    }
}
