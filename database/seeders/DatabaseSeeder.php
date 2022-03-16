<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\roles;
use Illuminate\Database\Seeder;
use Database\Factories\roleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();

        roles::create([
            'name' => 'admin',
        ]);
        roles::create([
            'name' => 'dosen',
        ]);
        roles::create([
            'name' => 'mahasiswa',
        ]);
        roles::create([
            'name' => 'karyawan',
        ]);
    }
}
