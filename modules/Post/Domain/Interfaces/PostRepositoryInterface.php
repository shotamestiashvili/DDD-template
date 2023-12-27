<?php

namespace Post\Domain\Interfaces;

use Illuminate\Support\Collection;
use Post\Domain\Models\PostModel;

interface PostRepositoryInterface
{
    public function findByIdOrFail(int $id): PostModel;
    public function findByIdAndUserIdOrFail(int $id, int $userId): PostModel;
    public function getAll(): Collection;

}
