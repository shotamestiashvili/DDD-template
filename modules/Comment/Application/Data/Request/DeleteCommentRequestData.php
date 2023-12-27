<?php

namespace Comment\Application\Data\Request;

use Comment\Application\Data\Internal\DeleteCommentData;
use Comment\Domain\Interfaces\CommentRepositoryInterface;
use Comment\Infrastructure\Repostiories\CommentRepository;
use Spatie\LaravelData\Attributes\FromRouteParameter;
use Spatie\LaravelData\Data;
class DeleteCommentRequestData extends Data
{
    private readonly CommentRepository $postRepository;

    public function __construct(
        #[FromRouteParameter('id')]
        public readonly int $id
    )
    {
        $this->postRepository = app()->make(CommentRepositoryInterface::class);
    }

    public function postDeleteData(): DeleteCommentData
    {
        return new DeleteCommentData(
            model: $this->postRepository->findByIdAndUserIdOrFail($this->id, $this->getUserId())
        );
    }

    private function getUserId(): int
    {
        return 1;
    }
}
