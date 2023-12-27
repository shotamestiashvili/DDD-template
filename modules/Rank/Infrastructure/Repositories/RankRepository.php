<?php

namespace Rank\Infrastructure\Repositories;

use Rank\Domain\Enums\RankEnums;
use Rank\Domain\Interfaces\RankRepositoryInterface;
use Rank\Domain\Models\RankModel;

class RankRepository implements RankRepositoryInterface
{
    public function findByUserIdOrFail(int $id): RankModel
    {
        return RankModel::where('user_id', $id)->first();
    }

    public function getUserRank(int $id): string
    {
        $rating = RankModel::where('user_id', $id)->value('rating');
        return RankEnums::getRank($rating);
    }
}
