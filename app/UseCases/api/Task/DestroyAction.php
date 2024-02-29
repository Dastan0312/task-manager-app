<?php

namespace App\UseCases\api\Task;

use App\Models\Task;

class DestroyAction
{
    public function __invoke(Task $task,)
    {
        return $task->delete();
    }
}
