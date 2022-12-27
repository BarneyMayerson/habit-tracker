<?php

namespace App\Http\Controllers;

use App\Models\Habit;

class HabitsController extends Controller
{
    public function index()
    {
        $habits = Habit::all();

        return view('habits.index', [
            'habits' => $habits,
        ]);
    }

    public function store()
    {
        Habit::create([
            'name' => request('name'),
            'times_per_day' => request('times_per_day'),
        ]);

        return to_route('habits.index');
    }

    public function update(Habit $habit)
    {
        $habit->update([
            'name' => request('name'),
            'times_per_day' => request('times_per_day'),
        ]);
        
        return to_route('habits.index');
    }
}
