<?php

namespace App\UseCases\api\Task;

use App\Models\Task;

class IndexAction
{
    public function __invoke($params)
    {
        $tasks = Task::query()
            ->when(!empty($params['status']), function ($query) use ($params) {
                $query->where('status', $params['status']);
            })
            ->when(!empty($params['created_at']), function ($query) use ($params) {
                $query->whereDate('created_at',$params['created_at']);
            })
            ->get();

        return $tasks;
    }
}
