<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\OnedayScheduleRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index(){
        $schedules = Auth::user()->schedules()->orderBy('day', 'asc')->get();
        return view('schedules.index', compact('schedules'));
    }


    public function create(){
        return view('schedules.create');
    }

    public function store(ScheduleRequest $request){
        $schedule = new Schedule();
        $schedule->user_id = Auth::id();
        $schedule->title = $request->input('title');
        $schedule->day = $request->input('day');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->room_name = $request->input('room_name');
        $schedule->save();

        return redirect()->route('schedules.index')->with('flash_message', '予約が完了しました');
    }

    public function onedayStore(OnedayScheduleRequest $request){
        $schedule = new Schedule();
        $schedule->user_id = Auth::id();
        $schedule->title = $request->input('title');
        $schedule->day = $request->input('day');
        $schedule->start = '00:00:00';
        $schedule->end = '23:59:59';
        $schedule->room_name = $request->input('room_name');
        $schedule->save();

        return redirect()->route('schedules.index')->with('flash_message', '予約が完了しました');
    }

    public function edit(Schedule $schedule){
        return view('schedules.edit', compact('schedule'));
    }

    public function update(ScheduleRequest $request, Schedule $schedule){
        $schedule->user_id = Auth::id();
        $schedule->title = $request->input('title');
        $schedule->day = $request->input('day');
        $schedule->start = $request->input('start');
        $schedule->end = $request->input('end');
        $schedule->room_name = $request->input('room_name');
        $schedule->save();

        return redirect()->route('schedules.index', $schedule)->with('flash_message', '予約を変更しました');
    }

    public function cancel(Schedule $schedule){
        $schedule->delete();
        return redirect()->route('schedules.index')->with('flash_message', '予約をキャンセルしました。');
    }

    public function calendar(Schedule $schedule){
        $schedules = Schedule::all();
        return response()->json($schedule);
    }

}
