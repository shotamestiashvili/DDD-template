<?php

namespace Comment\Application\Actions;

use Comment\Application\Data\Internal\CreateCommentData;
use Comment\Domain\Data\CommentUserData;
use Comment\Domain\Events\CommentLikeEvent;
use Comment\Domain\Models\CommentModel;

class CreateCommentAction
{
    public function __construct(private readonly SaveModelAction $saveModelAction){}

    public function execute(CreateCommentData $data): CommentModel
    {
        return $this->createComment($data);
    }

    public function createComment(CreateCommentData $data): CommentModel
    {
        $model = new CommentModel();

        $model->user_id = $data->user_id;
        $model->post_id = $data->post_id;
        $model->text = $data->text;

        $this->saveModelAction->execute($model, $data->user_id);

        return $model;
    }
}
