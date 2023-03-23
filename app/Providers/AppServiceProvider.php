<?php

namespace App\Providers;

use App\Http\Livewire\User;
use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(UserInterface::class, UserRepository::class);
        // $this->app->singleton(User::class, function(){
        //     return new User(UserInterface $userRepository);
        // });
    }
}
