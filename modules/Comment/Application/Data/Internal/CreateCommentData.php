<?php

namespace Comment\Application\Data\Internal;

use Spatie\LaravelData\Data;

class CreateCommentData extends Data
{
    public function __construct(
        public readonly int $post_id,
        public readonly int $user_id,
        public readonly ?string $text,
    ){}
}
