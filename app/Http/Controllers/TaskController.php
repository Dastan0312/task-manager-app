<?php

namespace App\Http\Controllers;

use App\Http\Requests\api\IndexRequest;
use App\Http\Requests\api\StoreRequest;
use App\Http\Requests\api\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\UseCases\api\Task\DestroyAction;
use App\UseCases\api\Task\IndexAction;
use App\UseCases\api\Task\StoreAction;
use App\UseCases\api\Task\UpdateAction;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request, IndexAction $action)
    {
        $tasks = $action($request->validated()); 
        
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => TaskResource::collection($tasks),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, StoreAction $action)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => new TaskResource($action($request->validated())),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => new TaskResource($task),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Task $task, UpdateAction $action)
    {
        $task = $action($request->validated(), $task);

        return response()->json([
            'success' => true,
            'message' => 'Updated successfully',
            'data' => new TaskResource($task),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, DestroyAction $action)
    {
        $action($task);

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully',
        ]);
    }
}
