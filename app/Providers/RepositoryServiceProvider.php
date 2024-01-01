<?php

namespace App\Providers;

use App\Contracts\TaskContract;
use App\Contracts\UserContract;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected array $repositories = [
        UserContract::class => UserRepository::class,
        TaskContract::class => TaskRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
