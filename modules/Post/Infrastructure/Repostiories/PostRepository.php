<?php

namespace Post\Infrastructure\Repostiories;

use Illuminate\Support\Collection;
use Post\Domain\Interfaces\PostRepositoryInterface;
use Post\Domain\Models\PostModel;

class PostRepository implements PostRepositoryInterface
{

    public function findByIdOrFail(int $id): PostModel
    {
        return PostModel::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return PostModel::all();
    }

    public function findByIdAndUserIdOrFail(int $id, int $userId): PostModel
    {
        return PostModel::query()->where('user_id', $userId)->find($id);
    }
}
