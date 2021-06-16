<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SpeakerSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(AmenitySeeder::class);
        $this->call(FaqSeeder::class);
    }
}
