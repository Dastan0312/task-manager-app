<?php

namespace App\UseCases\api\Task;

use App\Models\Task;

class UpdateAction
{
    public function __invoke($params, Task $task,)
    {
        $task->update($params); 

        return $task;
    }
}
