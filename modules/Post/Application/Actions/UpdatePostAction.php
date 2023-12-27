<?php

namespace Post\Application\Actions;

use Post\Application\Data\Internal\UpdatePostData;
use Post\Domain\Models\PostModel;

class UpdatePostAction
{
    public function __construct(private readonly SaveModelAction $saveModelAction){}

    public function execute(UpdatePostData $data): PostModel
    {
        return $this->updatePost($data->model, $data);
    }

    private function updatePost(PostModel $model, UpdatePostData $data): PostModel
    {
        $model->title = $data->title;
        $model->text = $data->text;

        $this->saveModelAction->execute($model, $data->userId);

        return $model;
    }
}
