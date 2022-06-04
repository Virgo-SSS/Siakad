<?php

namespace Database\Seeders;

use App\Models\batch;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class batchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i <= 4; $i++){
            $time = $i*3;
            batch::create([
                'name' => 'Gelombang'. ' ' .$i. ' ' .'2019/2020',
                'code' => 'G'.$i,
                'price' => 'Rp. 100.000',
                'start_date' => '2022-'.$time.'-01 00:00:00',
                'end_date' => '2022-'.$time.'-31 23:59:59',
                'isActive' => 0
            ]);
        }
    }
}
