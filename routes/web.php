<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



//Route::get('/users', function () {
//    return view('user-list');
//});

Route::get('/users', [\App\Http\Controllers\pagesController::class, 'AllUsers']);

