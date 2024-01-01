<?php

namespace App\Repositories;

use App\Contracts\TaskContract;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskContract
{
    public function create(array $data): Task
    {
        $data['avatar'] = strtoupper(substr($data['team'], 0, 2));
        $data['due_date'] = Carbon::parse($data['due_date'])->format('y-m-d');
        return Task::create($data);
    }
    public function getAll(): Collection
    {
        return Task::query()->orderBy('id', 'desc')->get();
    }
}
