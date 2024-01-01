<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name' => 'PBO 2023/2024',
                'user_id'=>'2',
                'kelas' => '3KA02',
            ],
            [
                'name' => 'IMK 2023/2024',
                'user_id'=>'2',
                'kelas' => '3KA01',
            ],
                
        ];
        foreach ($courses as $key => $course) {
            Course::create($course);
        }
    }
}
