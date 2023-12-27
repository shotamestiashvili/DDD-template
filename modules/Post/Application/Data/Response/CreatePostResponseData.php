<?php

namespace Post\Application\Data\Response;

use Spatie\LaravelData\Data;

class CreatePostResponseData extends Data
{
    public function __construct(
        public readonly int $id
    ){}
}
