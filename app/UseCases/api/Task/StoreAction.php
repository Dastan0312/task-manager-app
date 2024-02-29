<?php

namespace App\UseCases\api\Task;

use App\Models\Task;

class StoreAction
{
    public function __invoke($params)
    {
        $task = Task::create($params);

        return $task;
    }
}
