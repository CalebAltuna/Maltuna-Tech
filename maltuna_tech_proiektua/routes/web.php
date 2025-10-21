<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    Route::get('/Users', [UserController::class,'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/users/register', [UserController::class, 'create'])->name('users.register');
    Route::post('users/register', [UserController::class, 'store'])->name('users.register.store');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
