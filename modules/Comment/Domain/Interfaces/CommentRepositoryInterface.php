<?php

namespace Comment\Domain\Interfaces;

use Comment\Domain\Models\CommentModel;
use Illuminate\Support\Collection;
use Post\Domain\Models\PostModel;

interface CommentRepositoryInterface
{
    public function findByIdOrFail(int $id): CommentModel;
    public function findByPostIdOrFail(int $postId): CommentModel;
    public function findByPostIdAndUserIdOrFail(int $postId, int $userId): CommentModel;
    public function findByIdAndUserIdOrFail(int $id, int $userId): CommentModel;
    public function getAll(): Collection;
}
