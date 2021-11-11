<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;

use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\DashboardStats;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        DB::transaction(function () use ($request){
        //Order Model
        $orders = new Order;
        $orders->unique_key = Str::random(8);
        $orders->taken_by = $request->taken_by;
        $orders->table_number = $request->table_number;
        $orders->extra_notes = $request->extra_notes;
        $orders->total_amount = $request->total_amount;
        $orders->status = 'active';
        $orders->save();
        $order_id = $orders->id;

        Table::where('table_number',$request->table_number)->update([
            'status' => 'active',
            'order' => $order_id
        ]);

        //Order Details Model
        for ($product_id=0; $product_id < count($request->product_id); $product_id++) {
            $product = Product::where('id','=',$request->product_id[$product_id])->first();
            if ($product->type == 'Drinks') {

            if ($product->category == 'cocktail') {
                $section = 'cocktail bar';
            }else{
                $section = 'main bar';
            }
            }
            if($product->type == 'Food'){
                $section = 'kitchen';
            }

            $order_details = new OrderDetail;
            $order_details->order_key_id = $order_id;
            $order_details->dispatched_to = $section;
            $order_details->product_key_id = $request->product_id[$product_id];
            $order_details->quantity = $request->quantity[$product_id];
            $order_details->discount = $request->discount[$product_id];
            $order_details->amount = $request->total_amount[$product_id];
            $order_details->save();
        }

        // Last Order History
        $products = Product::all();
        $order_details = OrderDetail::where('order_key_id', $order_id)->get();

        // Last Order Details
        $order_receipt = OrderDetail::where('order_key_id', $order_id)->get();
        $orderedBy = Order::where('id',$order_id)->get();

        });
        Cart::where('user_key','=',Auth::user()->id)->delete();
        return redirect()->back()->with('success','Order placed successfully.');

    }

     public function item_ready(Request $request){

        DB::table('order_details')
             ->where('order_key_id','=',$request->order_id)
             ->where('product_key_id','=',$request->product_id)
             ->update([
                 'ready' => 'ready',
             ]);

        $order_id = $request->order_id;
        $item_name = $request->item_name;
        $taken_by = $request->taken_by;
        $user = Auth::user();

        $notification = new Notification([
            'unique_key' => Str::random(8),
            'for'        => $taken_by,
            'from'       => $user->name,
            'purpose'    => 'Item Ready',
            'time'       => Carbon::now('Africa/Nairobi'),
            'completed'  => 'false',
            'message'    => "$item_name for order $order_id is ready.",
        ]);
        $notification->save();

        return Redirect::back()->with('success', 'Successfully Notified Waiter!');;
    }


}
