<?php

namespace Comment\Infrastructure\Repostiories;

use Comment\Domain\Interfaces\CommentRepositoryInterface;
use Comment\Domain\Models\CommentModel;
use Illuminate\Support\Collection;
use PhpParser\Comment;
use Post\Domain\Models\PostModel;

class CommentRepository implements CommentRepositoryInterface
{
    public function findByIdOrFail(int $id): CommentModel
    {
        return CommentModel::query()->findOrFail($id);
    }

    public function findByPostIdOrFail(int $postId): CommentModel
    {
        // TODO: Implement findByPostIdOrFail() method.
    }

    public function findByPostIdAndUserIdOrFail(int $postId, int $userId): CommentModel
    {
        // TODO: Implement findByPostIdAndUserIdOrFail() method.
    }

    public function findByIdAndUserIdOrFail(int $id, int $userId): CommentModel
    {
       return CommentModel::query()->where('user_id', $userId)->find($id);
    }

    public function getAll(): Collection
    {
        return CommentModel::all();
    }
}
