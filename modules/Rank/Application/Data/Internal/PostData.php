<?php

namespace Rank\Application\Data\Internal;

use Rank\Domain\Enums\PostWeightEnums;
use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public readonly string $userId,
        public readonly PostWeightEnums $weight,
    ){}
}
