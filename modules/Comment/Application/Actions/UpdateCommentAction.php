<?php

namespace Comment\Application\Actions;

use Comment\Application\Data\Internal\UpdateCommentData;
use Comment\Domain\Models\CommentModel;

class UpdateCommentAction
{
    public function __construct(private readonly SaveModelAction $saveModelAction)
    {
    }

    public function execute(UpdateCommentData $data): CommentModel
    {
        return $this->updateComment($data->model, $data);
    }

    private function updateComment(CommentModel $model, UpdateCommentData $data): CommentModel
    {
        $model->user_id = $data->userId;
        $model->text = $data->text;

        $this->saveModelAction->execute($model, $data->userId);

        return $model;
    }
}
