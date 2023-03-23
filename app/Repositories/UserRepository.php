<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Livewire\WithPagination;

class UserRepository implements UserInterface
{
    use WithPagination;
    // public function __construct(private User $user)
    // {

    // }

    public static function getWithPagination(string $search)
    {
        return User::paginate(10);
    }
}
