<?php

namespace Database\Seeders;

use App\Models\karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class karyawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        karyawan::create([
            'name' => 'Doe',
            'email' => 'doe@gmail.com',
            'password' => bcrypt('password'),
            'nohp' => '081232321212',
            'posisi' => 'Marketing',
            'image' => 'img/karyawan.png'
        ]);
    }
}
