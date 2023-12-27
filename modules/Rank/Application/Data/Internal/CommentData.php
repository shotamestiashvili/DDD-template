<?php

namespace Rank\Application\Data\Internal;

use Rank\Domain\Enums\CommentWeightEnums;
use Spatie\LaravelData\Data;

class CommentData extends Data
{
    public function __construct(
        public readonly string $userId,
        public readonly CommentWeightEnums $weight,
    ){}
}
