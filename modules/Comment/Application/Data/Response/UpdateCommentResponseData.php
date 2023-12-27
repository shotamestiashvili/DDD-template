<?php

namespace Comment\Application\Data\Response;

use Spatie\LaravelData\Data;

class UpdateCommentResponseData extends Data
{
    public function __construct(
        public readonly int $id
    ){}
}
