<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserContract {

    public function create(array $data): User {
        return User::create($data);
    }

    public function findByEmail(string $email): ?User {
        return User::where('email', $email)->first();
    }

    public function getAll(): Collection {
        return User::all();
    }
}
