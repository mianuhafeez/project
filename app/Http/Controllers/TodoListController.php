<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Inertia\Response;
use Inertia\Inertia;

class TodoListController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Show the tasks.
     *
    /**
     * @return Response
     */
    public function index():Response
    {
        $tasks= $this->taskService->getAllTasks();
        return Inertia::render('Todo/List',
            [
                'tasks' =>  TaskResource::collection($tasks)
            ]);
    }

    /**
     * API endpoint to store a new task.
     *
     * @param TaskRequest $request
     * @return JsonResponse
     */
    public function store(TaskRequest $request): JsonResponse
    {
        try {
            $taskData = $request->validated();
            $task = $this->taskService->createTask($taskData);

            return response()->json([
                'message' => 'Task created successfully!',
                'task' => TaskResource::make($task),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Task creation failed.',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
