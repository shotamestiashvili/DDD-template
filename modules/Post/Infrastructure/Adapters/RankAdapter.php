<?php

namespace Post\Infrastructure\Adapters;

use Rank\Domain\Interfaces\RankRepositoryInterface;

class RankAdapter
{
    public function __construct(
        private readonly RankRepositoryInterface $rankRepository
    ){
    }

    public function getUserRank(int $id)
    {
        return $this->rankRepository->getUserRank($id);
    }

}
