<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Study')->insert([
            [
                'name' => '1',
            ],
            [
                'name' => '2',
            ],
            [
                'name' => '3',
            ],
            [
                'name' => '4',
            ],
            [
                'name' => '5',
            ],
            [
                'name' => '6',
            ],
            [
                'name' => '7',
            ],
            [
                'name' => '8',
            ],
            [
                'name' => '9',
            ],
            [
                'name' => '10',
            ],
        ]);
    }
}
