<?php

namespace App\Services;

use App\Models\Booking;
use Illuminate\Support\Carbon;

class BookingUsageService
{
    public function currentUsage(int $capacity = 3):array
    {
        $now = Carbon::now();
        $nowDate = $now->toDateString();
        $nowTime = $now->format('H:i:s');

        $currentCount = Booking::query()
            ->whereDate('start_date', '<=', $nowDate)
            ->whereDate('end_date', '>=', $nowDate)
            ->whereTime('start_time', '<=', $nowTime)
            ->whereTime('end_time', '>', $nowTime)
            ->count();

        return [
            'currentCount' => $currentCount,
            'capacity' => $capacity,
            'isFull' => $currentCount >= $capacity,
        ];
    }

}
