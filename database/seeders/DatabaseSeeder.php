<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    /*public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }*/

    public function run()
    {
        $createUserNames = ['田中太郎', '高坂桐乃', '五更瑠璃', '久遠寺有珠'];
        foreach ($createUserNames as $userName) {
            User::factory()->create([
                'name' => $userName,
            ])->schedules()->create([
                'title' => 'プログラミング',
                'day' => Carbon::now()->addDay()->format('Y-m-d'),
                'start' => '07:00:00',
                'end' => '11:00:00',
            ]);
        }
    }
}
