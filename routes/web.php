<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Route
Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['auth']
    ], function() {
    // User Route 
        Route::group(
            [
                'as' => 'user.',
                'prefix' => 'user',
                'controller' => UserController::class
            ], function() {
                Route::get('index', 'index')->name('index');
        });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
