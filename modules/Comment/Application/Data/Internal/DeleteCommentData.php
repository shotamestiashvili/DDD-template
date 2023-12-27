<?php

namespace Comment\Application\Data\Internal;

use Comment\Domain\Models\CommentModel;
use Spatie\LaravelData\Data;

class DeleteCommentData extends Data
{
    public function __construct(
        public readonly CommentModel $model,
    )
    {
    }
}
