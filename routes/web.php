<?php

use App\Http\Controllers\HabitsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/habits', [HabitsController::class, 'index'])->name('habits.index');
