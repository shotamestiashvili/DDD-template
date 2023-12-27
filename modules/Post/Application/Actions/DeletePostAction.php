<?php

namespace Post\Application\Actions;

use Post\Application\Data\Internal\DeletePostData;

class DeletePostAction
{
    public function __construct(){}

    public function execute(DeletePostData $data): void
    {
        $data->model->delete();
    }
}
