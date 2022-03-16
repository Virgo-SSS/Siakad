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
        User::create([
            'name' => 'Virgo Stevanus',
            'email' => 'virgo@gmail.com',
            'password' => bcrypt('virgo')
        ]);

        $this->call(dosenSeeder::class);
        $this->call(pelajarSeeder::class);
        $this->call(karyawanSeeder::class);
    }
}
