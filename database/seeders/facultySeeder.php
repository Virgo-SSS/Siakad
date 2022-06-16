<?php

namespace Database\Seeders;

use App\Models\faculty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class facultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // always remember to make faculty id on faculty table is 1-10
        $list = [
            'Arts & Architecture',
            'Education',
            'History',
            'Humanities',
            'Languages',
            'Engineering & Applied Science',
            'Harvard Integrated Life Sciences',
            'Mathematics',
            'Social Sciences',
            'Biological Sciences',
            'Medical Sciences',
            'Physical Sciences'
        ];

        foreach ($list as $faculty) {
            faculty::create([
                'name' => $faculty
            ]);
        }
    }
}
