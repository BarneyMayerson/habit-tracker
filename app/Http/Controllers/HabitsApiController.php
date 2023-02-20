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

    public function update(Habit $habit)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'times_per_day' => 'required',
        ]);

        $habit->update([
            'name' => request('name'),
            'times_per_day' => request('times_per_day'),
        ]);

        return HabitResource::collection(Habit::withCount('executions')->get());
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();

        return HabitResource::collection(Habit::withCount('executions')->get());
    }
}
