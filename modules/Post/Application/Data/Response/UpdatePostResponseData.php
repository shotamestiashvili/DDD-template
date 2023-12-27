<?php

namespace Post\Application\Data\Response;

use Spatie\LaravelData\Data;

class UpdatePostResponseData extends Data
{
    public function __construct(
        public readonly int $id
    ){}
}
