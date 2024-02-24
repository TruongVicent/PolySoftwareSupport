<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'nguyenmingtruong9@gmail.com',
                'email_verified_at' => Carbon::now(),
                'code' => 'abcd1',
                'password' => '$2y$12$wegF68DHIYEHC35j92Aiw.5EHH5l.DdCGXctEZ0rMqP5vynsMPM8S',
                'remember_token' => '',
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}