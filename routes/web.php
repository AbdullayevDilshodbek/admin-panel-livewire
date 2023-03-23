<?php

use App\Http\Livewire\Counter;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Admin panel
    Route::get('/counter', Counter::class);
    Route::get('/users', User::class);
    Route::get('/logout', Logout::class);
});

Route::get('/login', Login::class)->name('login');
