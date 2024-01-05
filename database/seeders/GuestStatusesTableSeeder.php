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
            ['id' => 1, 'name' => 'pending', 'created_at' => $currentTimestamp],
            ['id' => 2, 'name' => 'accepted', 'created_at' => $currentTimestamp],
            ['id' => 3, 'name' => 'declined', 'created_at' => $currentTimestamp],
            ['id' => 4, 'name' => 'maybe', 'created_at' => $currentTimestamp],
        ]);
    }
}
