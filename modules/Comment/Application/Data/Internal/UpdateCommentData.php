<?php

namespace Comment\Application\Data\Internal;

use Comment\Domain\Models\CommentModel;
use Spatie\LaravelData\Data;

class UpdateCommentData extends Data
{
    public function __construct(
        public readonly CommentModel $model,
        public readonly int $userId,
        public readonly string $text,
        public readonly int $like
    ){}
}
