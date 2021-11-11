<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SectionController extends Controller
{
     public function main_bar(){

        $all_orders = DB::table('orders')
        ->where('status','=','ongoing')
        ->paginate(10);

        $order_details = OrderDetail::where('ready','=',false)->get();

        $tables = Table::all();


        return view('admin.orders.main-bar', [
        'all_orders' => $all_orders,
        'tables' => $tables,
        'order_details' => $order_details
        ]);

    }

    public function kitchen(){

        $all_orders = DB::table('orders')
        ->where('status','=','ongoing')
        ->paginate(10);

        $order_details = OrderDetail::where('ready','=',false)->get();

        $tables = Table::all();


        return view('admin.orders.kitchen', [
        'all_orders' => $all_orders,
        'tables' => $tables,
        'order_details' => $order_details
        ]);

    }

    public function cocktail_bar(){

        $all_orders = DB::table('orders')
        ->where('status','=','ongoing')
        ->paginate(10);

        $order_details = OrderDetail::where('ready','=',false)->get();

        $tables = Table::all();


        return view('admin.orders.cocktail-bar', [
        'all_orders' => $all_orders,
        'tables' => $tables,
        'order_details' => $order_details
        ]);

    }

     public function ongoing(){

        $all_orders = DB::table('orders')
                        ->where('status','=','ongoing')
                        ->paginate(10);

        $order_details = OrderDetail::all();

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

        $order_details = OrderDetail::all();
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

        $order_details = OrderDetail::all();
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

        return Redirect::back()->with(['message', 'Successfully Delete Order']);
    }

    public function close_order(Request $request){

        $order_id = $request->input('order_id');
        if ($request->discount) {
            $discount = $request->discount;
        }else{
            $discount = 0;
        }
        $amount_received = $request->input('amount_received');
        $discount = $request->discount;
        $closed_by = $request->input('closed_by');
        $taken_by = $request->input('taken_by');
        $table_number = $request->input('table_number');
        $completed_at = Carbon::now();

        $kitchen = 0;
        $cocktail = 0;
        $main = 0;

        $total_items = DB::table('order_details')->where('order_id','=',$order_id)->get();

        foreach ($total_items as $item) {
            if ($item->dispatched_to == 'kitchen') {
                $kitchen = $kitchen + (int)$item->price;
            }
            if ($item->dispatched_to == 'main bar') {
                $main= $main + (int)$item->price;
            }
            if ($item->dispatched_to == 'cocktail bar') {
                $cocktail = $cocktail + (int)$item->price;
            }
        }


        $new_sale = new Sale([
            'unique_id' => substr( bin2hex( random_bytes( 8 ) ),  0, 8 ),
            'handled_by' => $taken_by,
            'total' => $amount_received,
            'kitchen' => $kitchen,
            'mainbar' => $main,
            'cocktailbar' => $cocktail,
            'discount' => $discount
        ]);

        $new_sale->save();


        $close = DB::table('orders')
                            ->where('id',$order_id)
                            ->where('taken_by',$taken_by)
                            ->where('table_number',$table_number)
                            ->update([
                                'status'          => 'closed',
                                'amount_received' => $amount_received,
                                'closed_by'       => $closed_by,
                                'completed_at'       => $completed_at
                            ]);

        $update_table = DB::table('tables')->where('table_number',$table_number)->update(['status' => 'free']);


        return Redirect::back()->with(['message', 'Successfully Closed Order']);
    }

    public function item_ready(Request $request){

        $item_ready = DB::table('order_details')
                        ->where('order_id','=',$request->input('order_id'))
                        ->where('item_name','=',$request->input('item_name'))
                        ->where('taken_by','=',$request->input('taken_by'))
                        ->update([
                            'ready' => true,
                        ]);

        return Redirect::back()->with(['success', 'Successfully Notified Waiter']);
    }

    public function print_r(Request $request){
        $order = Order::where('id','=',$request->id)->first();
        $details = OrderDetail::where('order_id','=',$order->id)->get();

        return view('admin.orders.print',[
            'order' => $order,
            'details' => $details
        ]);
    }

    public function show_edit(Request $request){
        $order = Order::where('id','=',$request->id)->first();
        $order_details = OrderDetail::where('order_id','=',$order->id)->paginate(25);

        return view('admin.orders.edit', [
            'order' => $order,
            'order_details' => $order_details
        ]);
    }

    public function add_item(Request $request){
        $order = Order::where('id','=',$request->id)->first();
        $item = Product::where('name','=',$request->item_name)->first();

        if ($item->major_category == 'Drinks') {

            if ($item->category == 'cocktail') {
                $section = 'cocktail bar';
            }else{
                $section = 'main bar';
            }
        }

        if($item->major_category == 'Food'){
            $section = 'kitchen';
        }


        $new = new OrderDetail([
            'order_id' => $request->id,
            'taken_by' => $order->taken_by,
            'table_number' => $order->table_number,
            'item_name' => $request->item_name,
            'item_category' => $item->category,
            'dispatched_to' => $section,
            'item_m_category' => $item->major_category,
            'price' => $item->price,
            'quantity' => 1,
            'specifics' => 'regular',
            'priority' => 'regular'
        ]);

        $new->save();

        $order->update([
            'prices_total' => (int)$order->prices_total + (int)$item->price,
        ]);

        return redirect('/ongoing-orders')->with('success', 'Successfully Added Item To Order');
    }

    public function delete_item(Request $request){
        $order = Order::where('id','=',$request->id)->first();
        $item = Product::where('name','=',$request->item_name)->first();
        $order->update([
            'prices_total' => (int)$order->prices_total - (int)$item->price,
        ]);

        $detail = OrderDetail::where('order_id','=',$order->id)->where('item_name','=',$item->name)->first();
        $detail->delete();

        return redirect('/ongoing-orders')->with('success', 'Successfully Deleted Item From Order');
    }

    public function edit(Request $request){
        $data = request()->except(['_token','id']);

        $updates = array_filter($data);

        $order = Order::where('id','=',$request->id)->first();

    }

    public function search(Request $request){
        $order = Order::where('id','=',$request->id)->first();
        $details = OrderDetail::where('order_id','=',$request->id)->get();
        return view('admin.search.orders', [
            'order' => $order,
            'order_details' => $details
        ]);
    }

    //Ajax Requests
    public function get_details()
    {

        $data = DB::table('order_details')->select('*')->get();

        return response()->json($data);
    }

    public function get_mainbar_items(){
        $data = DB::table('order_details')->where('dispatched_to','=','main bar')->where('ready','=',false)->select('*')->get();

        $data = $data->filter();

        return response()->json($data);
    }

    public function get_kitchen_items(){
        $data = DB::table('order_details')->where('dispatched_to','=','kitchen')->where('ready','=',false)->select('*')->get();

        $data = $data->filter();

        return response()->json($data);
    }

    public function get_cocktailbar_items(){
        $data = DB::table('order_details')->where('dispatched_to','=','cocktail bar')->where('ready','=',false)->select('*')->get();

        $data = $data->filter();

        return response()->json($data);
    }
}
