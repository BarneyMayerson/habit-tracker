<?php

namespace App\Http\Controllers;

use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Http\Request;

class HabitsApiController extends Controller
{
    public function index()
    {
        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'times_per_day' => 'required',
        ]);

        Habit::create($attributes);

        return HabitResource::collection(Habit::withCount('executions')->get());
    }
}
