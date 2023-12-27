<?php

namespace Post\Application\Data\Internal;

use Post\Domain\Models\PostModel;
use Spatie\LaravelData\Data;

class DeletePostData extends Data
{
    public function __construct(
        public readonly PostModel $model,
    )
    {
    }
}
