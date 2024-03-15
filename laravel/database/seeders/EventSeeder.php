<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'name' => 'Workshop Database basic to advanced',
            'image' => 'htmt.jpg',
            'content' => 'Buổi hướng dẫn sinh viên quản lý database hiệu quả',
            'user_id' => '1',
            'event_type_id' => '1',
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now(),
            'target_audience' => 'Sinh viên công nghệ thông tin',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
