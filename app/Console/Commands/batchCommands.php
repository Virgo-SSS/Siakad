<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\batch;
use Illuminate\Console\Command;

class batchCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update batch command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        //  command ini harus nya ada di app admin, jadi ini hanya sementara buat testing 
        // jika admin app sudah di buat maka akan di migrasi ke sana
        $batch = batch::all();
        
        foreach($batch as $bat){
           
            if(Carbon::parse($bat->start_date)->format('Y-m-d H:i') == date('Y-m-d H:i')){
                $bat->isActive = 1;
                $bat->save();
            }
            if(Carbon::parse($bat->end_date)->format('Y-m-d H:i') == date('Y-m-d H:i')){
                $bat->isActive = 0;
                $bat->save();
            }
        }
        $this->info('batch register has been updated');
       
    }
}
