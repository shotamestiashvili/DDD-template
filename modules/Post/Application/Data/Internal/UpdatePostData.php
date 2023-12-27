<?php

namespace Post\Application\Data\Internal;

use Post\Domain\Enums\StatusEnums;
use Post\Domain\Models\PostModel;
use Spatie\LaravelData\Data;

class UpdatePostData extends Data
{
    public function __construct(
        public readonly int $userId,
        public readonly PostModel $model,
        public readonly ?string $title,
        public readonly ?string $text,
    )
    {
    }
}
