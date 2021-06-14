<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Str;
use DB;
use Log;

class config_products extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config_products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up missing info for imported items';

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
        $all_items = Product::all();
        $all_categories = DB::table('products')
            ->select('category')
            ->distinct()
            ->get();
            
        $drinks = array('cocktail','Beers', 'Gin','mocktail', 'vodka','Shooters','whiskey', 'Tea','red wine','rum','juices','water','cocktail','roses','sparkling','Smoothies and shakes','white wine','tequila','soft drinks','cognacs','Energy drinks','champagne','Sangria','Brandy','wine','liquors',);    
            
            foreach ($all_items as $product) {
                $unique_id = $product->id.'-'.Str::random(4);
                $barcode = substr( bin2hex( random_bytes( 8 ) ),  0, 8 ); 

                $product_category = DB::table('products')                    
                    ->where('id', $product->id )
                    ->pluck('category');

                    

                    if (in_array($product->category, $drinks, true )){ 
                        
                        $major_category = 'Drinks';
                        $update_item_categories = DB::table('products')
                                ->where('id', $product->id )
                                ->update([                                    
                                    'major_category'=>$major_category,                                                   
                                ]);
                    
                    } 
                    else { 
                            
                            $major_category = 'Food';

                            $update_item_categories = DB::table('products')
                                ->where('id', $product->id )
                                ->update([                                    
                                    'major_category'=>$major_category,                                                   
                                ]);
                        
                        }

                        $update_items = DB::table('products')
                                ->where('id', $product->id )
                                ->update([
                                    'unique_id' => $unique_id,
                                    'barcode' => $barcode,
                                    'quantity' => 2,
                                    'status' =>true,                                                                                      
                                ]);


            }

    }
}
