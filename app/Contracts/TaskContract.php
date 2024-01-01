<?php

namespace App\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskContract
{
    public function create(array $data): Task;

    public function getAll(): Collection;
}
