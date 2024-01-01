<?php

namespace App\Services;

use App\Contracts\UserContract;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserContract $userRepository;

    public function __construct(UserContract $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(RegisterRequest $request): User
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function findActiveUsers(): Collection
    {
        return $this->userRepository->getAll();
    }
}
