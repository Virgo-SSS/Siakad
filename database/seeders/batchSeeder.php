<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            $time = (string) $i*3;
            batch::create([
                'name' => 'Gelombang'. ' ' .$i. ' ' .'2019/2020',
                'code' => 'G'.$i,
                'price' => 'Rp. 100.000',
                'start_date' => Carbon::create('2022', $time, '01', '14', '15', '10'),
                'end_date' => Carbon::create('2022', $time, '31', '23', '10', '05'),
                'isActive' => 0
            ]);
            
            
        }
    }
}
