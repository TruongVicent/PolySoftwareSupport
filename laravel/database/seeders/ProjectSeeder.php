<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'name' => 'PolySoftwareSupport',
            'description' => 'Hỗ trợ sinh viên trường',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now(),
            'project_type_id' => '1',
            'banner' => 'img.png',
            'status' => '1'
        ]);
    }
}
