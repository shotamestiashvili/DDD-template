<?php

namespace Comment\Application\Data\Request;

use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;

class ShowCommentRequestData extends Data
{
    public function __construct(
        #[FromRouteParameter('id')]
        public readonly int $id
    )
    {
    }
}
