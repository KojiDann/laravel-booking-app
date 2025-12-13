<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index(){
        $schedules = Auth::user()->schedules()->orderBy('day', 'desc')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create(){
        return view('schedules.create');
    }

    public function store(){
        $schedule = new Schedule();
        $schedule->user_id ->Auth::id();
        $schedule->title ->input('title');
        $schedule->day ->input('day');
        $schedule->start ->input('start');
        $schedule->day ->input('end');
        $schedule->room_name ->input('room_name');
        $schedule->save();

        return redirect()->route('shcedules.create')->with('flash_message', '予約が完了しました');
    }
}
