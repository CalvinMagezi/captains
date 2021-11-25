<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Section;
use App\Models\OrderDetail;
use App\Models\SectionSale;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SectionSales extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'section:sales';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate Section Sales';

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
        $closed_orders = OrderDetail::with('orderKey')->with('productKey')->where('ready','=','ready')->get();

        $main_bar = 0;
        $kitchen = 0;
        $cocktail_bar = 0;

        foreach ($closed_orders as $order) {
           if($order->orderKey->status == 'closed'){
                if($order->dispatched_to == 'kitchen'){
                    $kitchen = $kitchen + (int)$order->productKey->price;
                     $sectionSale = SectionSale::where('section_id','=',3)->first();
                     $sectionSale->update([
                        'todays_sales' => $kitchen + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $kitchen + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $kitchen + (int)$sectionSale->weeks_sales,
                        'months_sales' => $kitchen + (int)$sectionSale->months_sales,
                        'years_sales' => $kitchen + (int)$sectionSale->years_sales,
                    ]);
                }
                if($order->dispatched_to == 'cocktail bar'){
                    $cocktail_bar = $cocktail_bar + (int)$order->productKey->price;
                     $sectionSale = SectionSale::where('section_id','=',2)->first();
                     $sectionSale->update([
                        'todays_sales' => $cocktail_bar + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $cocktail_bar + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $cocktail_bar + (int)$sectionSale->weeks_sales,
                        'months_sales' => $cocktail_bar + (int)$sectionSale->months_sales,
                        'years_sales' => $cocktail_bar + (int)$sectionSale->years_sales,
                    ]);
                }
                if($order->dispatched_to == 'main bar'){
                    $main_bar = $main_bar + (int)$order->productKey->price;
                    $sectionSale = SectionSale::where('section_id','=',1)->first();
                     $sectionSale->update([
                        'todays_sales' => $main_bar + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $main_bar + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $main_bar + (int)$sectionSale->weeks_sales,
                        'months_sales' => $main_bar + (int)$sectionSale->months_sales,
                        'years_sales' => $main_bar + (int)$sectionSale->years_sales,
                    ]);
                }
           }
        }

            echo "Main Bar: $main_bar \n Kitchen: $kitchen \n Cocktail Bar: $cocktail_bar";

    }
}
