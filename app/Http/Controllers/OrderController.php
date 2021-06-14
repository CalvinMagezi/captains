<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Table;
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


        return view('admin.orders.index', [
            'orders' => $all_orders,
            'total_orders' => $all_orders_count,
            'tables' => $all_tables,
        ]);
    }

    public function store(Request $request){        

        Log::info($request->all());

        $orders = Order::all();
        $total_orders = Order::all()->count();

        $taken_by = $request->input('taken_by');
        $table_number = $request->input('table_number',[]);
        $items = implode (",", $request->input('items',[]));
        $prices = implode (",", $request->input('prices',[]));     
        $quantities = implode (",", $request->input('quantities',[]));     
        $specifics = implode (",", $request->input('specifics',[]));     
        $priority = implode (",", $request->input('priority',[]));     
        $total = $request->input('total');     
        
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
        
        
        return redirect('/new-order')->with('success', 'Successfully Added New Table');    
    }
}
