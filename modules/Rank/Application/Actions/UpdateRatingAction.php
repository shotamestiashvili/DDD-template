<?php

namespace Rank\Application\Actions;


use Illuminate\Support\Facades\Log;
use Rank\Application\Data\Internal\CommentData;
use Rank\Application\Data\Internal\PostData;
use Rank\Domain\Interfaces\RankRepositoryInterface;
use Rank\Domain\Models\RankModel;

class UpdateRatingAction
{
    public function __construct(
        public readonly RankRepositoryInterface $rankRepository
    ){}

    public function execute(CommentData|PostData $data): void
    {
        $model = $this->rankRepository->findByUserIdOrFail($data->userId);
        $this->handleRating($data, $model);
    }

    private function handleRating(CommentData|PostData $data, RankModel $model): void
    {
        $model->rating += $data->weight->value;
        $model->save();
    }
}
