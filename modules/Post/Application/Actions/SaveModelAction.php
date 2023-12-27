<?php

namespace Post\Application\Actions;

use Post\Application\Data\Request\CreatePostRequestData;
use Post\Domain\Models\PostModel;

class SaveModelAction
{
    private PostModel $model;
    private string $userId;

    public function execute(PostModel $model, string $userId): bool {
        $this->model = $model;
        $this->userId = $userId;

        $this->before();

        return $this->model->save();
    }

    private function before(): void
    {
        $this->creating();
        $this->updating();
    }

    private function creating(): void
    {
        if (true === $this->model->exists) {
            return;
        }

        $this->model->created_by = $this->userId;
    }

    private function updating(): void
    {
        $this->model->updated_by = $this->userId;
    }
}
