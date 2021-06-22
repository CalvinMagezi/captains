<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Table;
use DB;
use Illuminate\Http\Request;
use Log;

class OrderController extends Controller
{
    public function index(Request $request) {
        $all_orders = Order::all();
        $all_orders_count = Order::all()->count();



        return view('admin.orders.index');
    }



    public function new_order(){
        $all_orders = Order::all();
        $all_orders_count = Order::all()->count();
        $all_tables = Table::all();

        $products = DB::table('products')->select('*')->get();

        $drinks = array('cocktail','Beers', 'Gin','mocktail', 'vodka','Shooters','whiskey', 'Tea','red wine','rum','juices','water','roses','sparkling','Smoothies and shakes','white wine','tequila','soft drinks','cognacs','Energy drinks','champagne','Sangria','Brandy','wine','liquors',);    
        

        return view('admin.orders.index', [
            'orders' => $all_orders,
            'total_orders' => $all_orders_count,
            'tables' => $all_tables,
            'drinks' => $drinks,
            'products' => $products
        ]);


    }

    public function store(Request $request){        

        Log::info($request->all());

        $orders = Order::all();
        $total_orders = Order::all()->count();

        $taken_by = $request->input('taken_by');
        $table_number = $request->input('table_number',[]);
        $items = implode (",", $request->input('items',[]));
        $items_arr = $request->input('items',[]);
        $prices = implode (",", $request->input('prices',[]));     
        $prices_arr = $request->input('prices',[]);     
        $quantities = implode (",", $request->input('quantities',[]));     
        $quantities_arr = $request->input('quantities',[]);     
        $specifics = implode (",", $request->input('specifics',[]));     
        $specifics_arr = $request->input('specifics',[]);     
        $priority = implode (",", $request->input('priority',[]));     
        $priority_arr = $request->input('priority',[]);     
        $total = $request->input('total');  

        $item_category_arr = $request->input('categories', []);
        $item_m_category_arr = $request->input('m_categories', []);
        
        $new_order = new Order([
            'status'       => 'ongoing',
            'taken_by'     => $taken_by,
            'table_number' => $table_number,
            'items'        => $items,
            'prices'       => $prices,
            'quantities'   => $quantities,
            'specifics'    => $specifics,
            'priority'     => $priority,
            'prices_total' => $total,  
        ]);

        $new_order->save();

        

        for ($i=0; $i < count($request->input('items',[])); $i++) { 

            if ($item_category_arr[$i] == 'cocktail') {
                $section = 'cocktail bar';
            }else{
                $section = 'main bar';
            }          
                        
            $new_order_details = new OrderDetails([
                'order_id'        => $new_order->id,
                'taken_by'        => $taken_by,
                'table_number'    => $table_number,
                'item_name'       => $items_arr[$i],
                'item_category'   => $item_category_arr[$i],
                'dispatched_to'   => $section,
                'item_m_category' => $item_m_category_arr[$i],
                'price'           => $prices_arr[$i],
                'quantity'        => $quantities_arr[$i],
                'specifics'       => $specifics_arr[$i],
                'priority'        => $priority_arr[$i],
            ]);

            $new_order_details->save();
        }
        
        
        
        
        return redirect('/new-order')->with('success', 'Successfully Added New Table');    
    }



    public function ongoing(){

        $all_orders = DB::table('orders')
                        ->where('status','=','ongoing')
                        ->paginate(10);

        $order_details = OrderDetails::all();   
        
        $tables = Table::all();


        return view('admin.orders.ongoing', [
            'all_orders' => $all_orders,
            'tables' => $tables,
            'order_details' => $order_details
        ]);
    }

    public function flagged(){
        $all_orders = DB::table('orders')
                        ->where('status','=','flagged')
                        ->orWhere('status','=','deleted')
                        ->paginate(10);

        $order_details = OrderDetails::all();  
        $tables = Table::all();


        return view('admin.orders.flagged', [
            'all_orders' => $all_orders,
            'tables' => $tables,
            'order_details' => $order_details
        ]);
    }

    public function closed(){
        $all_orders = DB::table('orders')
                        ->where('status','=','closed')
                        ->paginate(10);

        $order_details = OrderDetails::all();
        $tables = Table::all();  


        return view('admin.orders.closed', [
            'all_orders' => $all_orders,
            'tables' => $tables,
            'order_details' => $order_details
        ]);
    }

    public function soft_delete(Request $request){
        $order_id = $request->input('order_id');        

        $soft_delete = DB::table('orders')
                            ->where('id',$order_id)
                            ->update([
                                'status' => 'deleted'
                            ]);

        return Redirect::back()->with(['success', 'Successfully Delete Order']);
    }

    public function restore(Request $request){
        $order_id = $request->input('order_id');        

        $restore = DB::table('orders')
                            ->where('id',$order_id)
                            ->update([
                                'status' => 'ongoing'
                            ]);

        return Redirect::back()->with(['success', 'Successfully Delete Order']);
    }

    
}
