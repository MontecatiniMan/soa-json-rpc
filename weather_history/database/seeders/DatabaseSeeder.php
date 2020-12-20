<?php

namespace Database\Seeders;

use App\Models\WeatherHistory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 180; $i++) {
            $today = Carbon::now();

            DB::table(WeatherHistory::TABLE_NAME)->insert([
                'id' => 1,
                'temp' => rand(0, 450) / 10,
                'date_at' => $today->subDays(180 - $i)->format('Y-m-d'),
            ]);
        }
    }
}
