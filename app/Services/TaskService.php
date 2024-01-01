<?php

namespace App\Services;

use App\Contracts\TaskContract;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    protected TaskContract $taskRepository;

    public function __construct(TaskContract $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function createTask(array $data): Task
    {
        return $this->taskRepository->create($data);
    }

    public function getAllTasks(): Collection
    {
        return $this->taskRepository->getAll();
    }
}
