<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\OnedayBookingRequest;

class BookingController extends Controller
{
    public function index(){
        $bookings = Auth::user()->bookings()->orderBy('start_date', 'asc')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create(){
        return view('bookings.create');
    }

    public function store(BookingRequest $request){
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->start_date = $request->input('start_date');
        $booking->start_time = $request->input('start_time');
        $booking->end_date = $request->input('start_date');
        $booking->end_time = $request->input('end_time');
        $booking->save();

        return redirect()->route('bookings.index')->with('flash_message', '予約が完了しました');
    }

        public function onedayStore(OnedayBookingRequest $request){
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->start_date = $request->input('start_date');
        $booking->start_time = '00:00:00';
        $booking->end_date = $request->input('start_date');
        $booking->end_time = '23:59:59';
        $booking->save();

        return redirect()->route('bookings.index')->with('flash_message', '予約が完了しました');
    }


    public function edit(Booking $booking){
        return view('bookings.edit', compact('booking'));
    }

    public function update(BookingRequest $request, Booking $booking){
        $booking->user_id = Auth::id();
        $booking->start_date = $request->input('start_date');
        $booking->start_time = $request->input('start_time');
        $booking->end_date = $request->input('start_date');
        $booking->end_time = $request->input('end_time');
        $booking->save();

        return redirect()->route('bookings.index', $booking)->with('flash_message', '予約を変更しました');
    }

    public function cancel(Booking $booking){
        $booking->delete();
        return redirect()->route('bookings.index')->with('flash_message', '予約をキャンセルしました。');
    }
}
