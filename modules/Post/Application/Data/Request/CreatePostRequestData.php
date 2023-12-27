<?php

namespace Post\Application\Data\Request;


use Post\Application\Data\Internal\CreatePostData;
use Post\Domain\Enums\StatusEnums;
use Spatie\LaravelData\Data;

class CreatePostRequestData extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly string $text,
    )
    {
    }

    public function createPostData(): CreatePostData
    {
        return new CreatePostData(
            userId: $this->getUserId(),
            title: $this->title,
            text: $this->text,
            like: 0,
            status: StatusEnums::SUSPENDED->value,
        );
    }

    private function getUserId(): int
    {
        return 1;
    }
}
