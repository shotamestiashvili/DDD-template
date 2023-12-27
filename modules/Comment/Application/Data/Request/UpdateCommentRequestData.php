<?php

namespace Comment\Application\Data\Request;

use Comment\Application\Data\Internal\UpdateCommentData;
use Comment\Domain\Interfaces\CommentRepositoryInterface;
use Comment\Infrastructure\Repostiories\CommentRepository;
use Spatie\LaravelData\Data;
class UpdateCommentRequestData extends Data
{
    private readonly CommentRepository $commentRepository;
    public function __construct(
        public readonly int $comment_id,
        public readonly int $post_id,
        public readonly string $text,
    )
    {
        $this->commentRepository = app()->make(CommentRepositoryInterface::class);
    }

    public function updateCommentData(): UpdateCommentData
    {
        return new UpdateCommentData(
            model: $this->commentRepository->findByIdOrFail($this->comment_id),
            userId: $this->getUserId(),
            text: $this->text,
        );
    }

    public function getUserId()
    {
        return 1;
    }
}
