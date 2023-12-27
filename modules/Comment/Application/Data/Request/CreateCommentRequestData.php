<?php

namespace Comment\Application\Data\Request;

use Comment\Application\Data\Internal\CreateCommentData;
use Spatie\LaravelData\Data;

class CreateCommentRequestData extends Data
{
    public function __construct(
        public readonly int $post_id,
        public readonly string $text,
    )
    {
    }

    public function createCommentData(): CreateCommentData
    {
        return new CreateCommentData(
            post_id: $this->post_id,
            user_id: $this->getUserId(),
            text: $this->text,
        );
    }

    public function getUserId()
    {
        return 1;
    }
}
