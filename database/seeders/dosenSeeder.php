<?php

namespace Database\Seeders;

use App\Models\dosen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        dosen::create([
            'nidn' => 'D20221',
            'nama' => 'Jufri',
            'email' => 'jufri@gmail.com',
            'password' => bcrypt('password'),
            'jeniskelamin' => 'Laki-Laki',
            'alamat' => 'Jl. Kebon Kacang',
            'no_hp' => '0812341234',
            'foto' => 'img/dosen.jpg'


        ]);
    }
}
