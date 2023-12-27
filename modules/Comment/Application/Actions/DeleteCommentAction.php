<?php

namespace Comment\Application\Actions;

use Comment\Application\Data\Internal\DeleteCommentData;

class DeleteCommentAction
{
    public function __construct(){}

    public function execute(DeleteCommentData $data): void
    {
        $data->model->delete();
    }
}
