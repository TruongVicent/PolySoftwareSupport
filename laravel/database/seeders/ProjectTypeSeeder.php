<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectType;
use Illuminate\Support\Facades\DB;


class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectTypes = [
            [
                'name' => 'Dự án 1',
                'description' => 'Description of Type 1',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dự án mẫu',
                'description' => 'Description of Type 2',
                'status' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dự án tốt nghiệp',
                'description' => 'Description of Type 2',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dự án thực tập',
                'description' => 'Description of Type 2',
                'status' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dự án xã họi',
                'description' => 'Description of Type 2',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm các dòng dữ liệu khác nếu cần

        ];

        // Thêm dữ liệu vào bảng project_types
        ProjectType::insert($projectTypes);
        DB::table('project_types')->insert([
            'name' => 'Web app',
            'description' => 'Các web quản lý',
            'status' => '1'
        ]);

    }
}
