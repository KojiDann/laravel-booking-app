<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'user_id'=>1,
            'title'=>'会議',
            'day'=>'2025-12-09',
            'start'=>'7:00:00',
            'end'=>'10:00:00',
        ]);
    }
}
