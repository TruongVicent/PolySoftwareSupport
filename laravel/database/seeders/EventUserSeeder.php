<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_users')->insert([
            [
                'user_id' => '1',
                'event_id' => '3',
                'role' => 'Sinh vien',
                'status' => '1',
            ]
        ]);
    }
}
