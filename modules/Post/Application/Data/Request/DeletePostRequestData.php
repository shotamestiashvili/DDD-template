<?php

namespace Post\Application\Data\Request;

use Post\Application\Data\Internal\DeletePostData;
use Post\Domain\Interfaces\PostRepositoryInterface;
use Post\Infrastructure\Repostiories\PostRepository;
use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;

class DeletePostRequestData extends Data
{
    private readonly PostRepository $postRepository;

    public function __construct(
        #[FromRouteParameter('id')]
        public readonly int $id
    )
    {
        $this->postRepository = app()->make(PostRepositoryInterface::class);
    }

    public function postDeleteData(): DeletePostData
    {
        return new DeletePostData(
            model: $this->postRepository->findByIdAndUserIdOrFail($this->id, $this->getUserId())
        );
    }

    private function getUserId(): int
    {
        return 1;
    }
}
