<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordpressResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wordpress_resources')->insert([
            'name' => 'wordpress 4.1',
            'file' => 'wordpress.com',
            'version' => '3.2.1',
            'type' => 'Theme',
            'status' => '1'
        ]);
    }
}
