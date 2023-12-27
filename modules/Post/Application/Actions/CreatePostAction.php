<?php

namespace Post\Application\Actions;

use Post\Application\Data\Internal\CreatePostData;
use Post\Domain\Models\PostModel;

class CreatePostAction
{
    public function __construct(private readonly SaveModelAction $saveModelAction)
    {
    }

    public function execute(CreatePostData $data,): PostModel
    {
         return $this->createPost($data);
    }

    private function createPost(CreatePostData $data): PostModel
    {
        $model = new PostModel();

        $model->user_id = $data->userId;
        $model->title = $data->title;
        $model->text = $data->text;
        $model->status = $data->status;
        $model->like = $data->like;

        $this->saveModelAction->execute($model, $data->userId);

        return $model;
    }
}
