<?php

use App\Http\Controllers\HabitsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/habits', [HabitsController::class, 'index'])->name('habits.index');
Route::post('/habits', [HabitsController::class, 'store'])->name('habits.store');
Route::put('/habits/{habit}', [HabitsController::class, 'update'])->name('habits.update');
Route::delete('/habits/{habit}', [HabitsController::class, 'destroy'])->name('habits.destroy');
