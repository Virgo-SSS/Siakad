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
            'type' => 'MHS',
            'nim' => 'BA123',
            'name' => 'dev',
            'email' => 'dev@gmail.com',
            'password' => bcrypt('Abc12345'),
            'isActive' => 1,
       
        ]);

        User::create([
        
            'type' => 'PMB',
            'name' => 'test1',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('Abc12345'),
            'isActive' => 0,
            
        ]);

        User::create([
        
            'type' => 'PMB',
            'name' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('Abc12345'),
            'isActive' => 1,
            
        ]);

    }
}
