<?php

namespace App\Contracts;

use App\Models\User;

interface UserContract
{
    public function create(array $data): User;

    public function findByEmail(string $email): ?User;

    public function getAll();
}
