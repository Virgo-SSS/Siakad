<?php

namespace Database\Seeders;

use App\Models\registrasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class registrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        registrasi::create([
            'name' => 'Kristina Miranda Sinaga',
            'email' => 'kristina@gmail.com',
            'password' => bcrypt('password'),
            'confirm_password' => bcrypt('password'),
            'isMahasiswa' => 0
        ]);
    }
}
