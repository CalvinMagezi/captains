<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use DB;
use Log;

use App\Models\HappyHour;
use App\Models\Product;

class CheckHappyHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_happy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $products = Product::all();
        $holder = 0;
        $happy_hour = HappyHour::where('id','=',1)->first();
        $now = Carbon::now('Africa/Nairobi');
        $start = Carbon::parse($happy_hour->start);
        $end = Carbon::parse($happy_hour->end);

        $check = $now->between($start,$end);        

        if ($now->isSameMinute($start) == true) {
            Log::info("Happy Hour!! \n"); 

             foreach ($products as $item) {
                 $holder = $item->price;
                 $item->update([
                     'price' => $item->hprice,
                     'hprice' => $holder
                 ]);
             }

        }else{
            Log::info("Not Yet Happy Hour \n"); 
        }
        
        if ($now->isSameMinute($end) == true) {
            Log::info("End of Happy Hour \n"); 
            foreach ($products as $item) {
                $holder = $item->price;
                $item->update([
                    'price' => $item->hprice,
                    'hprice' => $holder
                ]);
            }
        }
              
    }
}
