<?php

use App\Http\Controllers\HabitsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('habits', [HabitsApiController::class, 'index']);
Route::post('habits', [HabitsApiController::class, 'store']);
Route::put('habits/{habit}', [HabitsApiController::class, 'update']);
