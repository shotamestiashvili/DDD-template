<?php

namespace Post\Application\Data\Request;

use Illuminate\Contracts\Container\BindingResolutionException;
use Post\Application\Data\Internal\UpdatePostData;
use Post\Domain\Interfaces\PostRepositoryInterface;
use Post\Infrastructure\Repostiories\PostRepository;
use Spatie\LaravelData\Data;

class UpdatePostRequestData extends Data
{
    private readonly PostRepository $postRepository;

    /**
     * @throws BindingResolutionException
     */
    public function __construct(
        public readonly int $post_id,
        public readonly ?string $title,
        public readonly ?string $text,
    )
    {
        $this->postRepository = app()->make(PostRepositoryInterface::class);
    }

    public function updatePostData(): UpdatePostData
    {
        return new UpdatePostData(
            userId: $this->getUserId(),
            model: $this->postRepository->findByIdOrFail($this->post_id),
            title: $this->title,
            text: $this->text,
        );
    }

    private function getUserId(): int
    {
        return 1;
    }
}
