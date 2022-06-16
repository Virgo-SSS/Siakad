<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\program_of_study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class program_of_studySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // always remember to make faculty id in faculty table is 1-10
        $list = [
            1 => [
                'Architecture, Landscape Architecture, and Urban Plnning',
                'Byzantine Studies',
                'Film And Visual Studies',
                'History of Art and Architecture',
                'Music'
            ],
            2 => [
                'Education',
            ],
            3 => [
                'Byzantine Studies',
                'East Asian Language and Civilizations',
                'History',
                'History of Art and Architecture',
                'History of Science',
            ],
            4 => [
                'Celtic Languages and Literatures',
                'English',
                'Germanic Languages and Literatures',
                'Near Eastern Languages and Civilizations',
                'Romance Languages and literatures',
                'Slavic Languages and Literatures',
                'South Asian Stuidies'
            ],
            5 =>[
                'Applied Physics',
                'Bioengineering',
                'Computational Science and Engineering',
                'Computer Science',
                'Data Science',
                'Electrical Engineering',
                'Environmental Science & Engineering',
                'Materials Science & Mechanical Engginering',
                'Quantum Science and Engineering'
            ],
            6 => [
                'Applied Mathematics',
                'Biostatistics',
                'Engineering and Applied Sciences',
                'Mathematics',
                'Statistics'
            ],
            7 => [
                'American Studies',
                'Anthropology',
                'Archeology',
                'Business Administration',
                'Business Economics',
                'Economics',
                'Government',
                'Health Policy',
                'International Relations',
                'Linguistics',
                'Organizational Behavior',
                'Political Economy and Government',
                'Psychology',
                'Public Policy',
                'Sociology',
                'Social Policy',
            ],
            8 => [
                'Biotechnology: Life Sciences',
                'Biological And Biomedical Sciense',
                'Biological Sciences in Dental Medicine',
                'Biological Sciences in Public Health',
                'Chemical Biology',
                'Chemistry and Chemical Biology',
                'Division of Medical Sciences',
                'Human Evolutionary Biology',
                'Immunology',
                'Molecular and Cellular Biology',
                'Neuroscience',
                'Organismic and Evolutionary Biology',
                'Speech and Hearing Bioscience and Technology',
                'Systems, Synthetic, and Quantitative Biology',
                'Virology'
            ],
            9 => [
                'Population Health Sciences',
                'Bioinformatics and Integrative Genomics',
                'Biological and Biomedical Sciences',
                'Speech and Hearing Bioscience and Technology '
            ],
            10 => [
                'Astronomy',
                'Biophysics',
                'Chemical Physics',
                'Chemistry and Chemical Biology',
                'Physics',
                'Earth and Planetary Sciences'
            ]
            
        ];

        foreach($list as $f_id => $val){
            foreach($val as $key => $value){
                program_of_study::create([
                    'name' => $value,
                    'faculty_id' => $f_id
                ]);
            }
        }
    }
}
