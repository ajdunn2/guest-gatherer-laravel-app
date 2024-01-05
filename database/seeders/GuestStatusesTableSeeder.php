<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        DB::table('guest_statuses')->insert([
            ['id' => 1, 'name' => '⏳ Awaiting Response', 'created_at' => $currentTimestamp],
            ['id' => 2, 'name' => '✅ Delighted to Attend', 'created_at' => $currentTimestamp],
            ['id' => 3, 'name' => '❌ Unable to Attend', 'created_at' => $currentTimestamp],
            ['id' => 4, 'name' => '🤔 Undecided (Will Confirm Later)', 'created_at' => $currentTimestamp],
        ]);
    }
}
