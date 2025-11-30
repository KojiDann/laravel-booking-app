<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index(){
        $rooms = DB::table('rooms')->get();

        return view('rooms.index', compact('rooms'));
    }
}
