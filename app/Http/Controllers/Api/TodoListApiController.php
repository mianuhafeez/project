<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class TodoListApiController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * API endpoint to get all tasks.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $tasks = $this->taskService->getAllTasks();

            return response()->json([
                'message' => 'Tasks retrieved successfully!',
                'tasks' => TaskResource::collection($tasks),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve tasks.',
                'error' => $e->getMessage(),
            ], 500);
        }
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
