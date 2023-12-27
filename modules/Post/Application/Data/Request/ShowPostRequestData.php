<?php

namespace Post\Application\Data\Request;


use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;

class ShowPostRequestData extends Data
{
    public function __construct(
        #[FromRouteParameter('id')]
        public readonly int $id
    )
    {
    }
}
