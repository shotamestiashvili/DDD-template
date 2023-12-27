<?php

namespace Rank\Domain\Interfaces;

use Rank\Domain\Enums\RankEnums;
use Rank\Domain\Models\RankModel;

interface RankRepositoryInterface
{
    public function findByUserIdOrFail(int $id): RankModel;
    public function getUserRank(int $id): string;
}
