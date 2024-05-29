<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\ScheduleEmp;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedule')->with('schedules', Schedule::all());
    }

    public function store(ScheduleEmp $request)
    {
        $request->validated();

        $schedule = new Schedule();
        $schedule->slug = $request->slug;
        $schedule->time_in = $request->time_in;
        $schedule->time_out = $request->time_out;
        $schedule->save();

        flash()->success('Success', 'Schedule has been created successfully!');
        return redirect()->route('schedule.index');
    }

    public function update(ScheduleEmp $request, Schedule $schedule)
    {
        $request->validated();

        $schedule->slug = $request->slug;
        $schedule->time_in = $request->time_in;
        $schedule->time_out = $request->time_out;
        $schedule->save();

        flash()->success('Success', 'Schedule has been updated successfully!');
        return redirect()->route('schedule.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        flash()->success('Success', 'Schedule has been deleted successfully!');
        return redirect()->route('schedule.index');
    }
}
