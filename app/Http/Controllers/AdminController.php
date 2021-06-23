<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Item;
use App\Models\Product;
use App\Models\Table;
use Gate;
use DB;
use Log;
use Auth;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

class AdminController extends Controller
{
    public function index(){

        $users = User::all();
        $orders = DB::table('orders')
                    ->where('status','=','ongoing')
                    ->paginate(10);
        $order_details = OrderDetails::all();
        $tables = Table::all();

        $waiters = DB::table('users')
        ->where('position','=','wait')
        ->orWhere('position','=','head waitress')
        ->get();

        $all_order_count = Order::all()->count();
        $all_closed_orders = Order::all()->where('status','=','closed')->count();

        $my_order_count = Order::all()->where('taken_by','=',Auth::user()->first_name.' '.Auth::user()->last_name)->count();
        $my_closed_order_count = Order::all()
                            ->where('taken_by','=',Auth::user()->first_name.' '.Auth::user()->last_name)
                            ->where('status','=','closed')
                            ->count();
        $my_assigned_tables = Table::where('managed_by','=',Auth::user()->first_name)->count();                            

        $active_table_count = Table::where('status','=','active')->count();
        
        return view('admin.dashboard', [
            'users' => $users,
            'orders' => $orders,
            'order_details' => $order_details,
            'waiters' => $waiters,
            'tables' => $tables,
            'all_orders' => $all_order_count,
            'all_closed_orders' => $all_closed_orders,
            'my_order_count' => $my_order_count,
            'my_closed_order_count' => $my_closed_order_count,
            'my_assigned_tables' => $my_assigned_tables,
            'total_active_tables' => $active_table_count,
        ]);
    }



    public function show_create(Request $request){


        if ($request->wantsJson()) {
            return response(
                $request->user()->cart()->get()
            );
        }
        $products = Product::all();              
       
        return view('admin.create-order', compact('products'));
    }

    public function create()
    {

        $items = Item::all();

        return view('admin.orders.create', compact('items'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        $products = $request->input('products', []);
        // $table_number = implode (". ", $request->input('table_number',[]));
        $quantities = implode (" ", $request->input('quantities',[]));
        $specifics = implode (" ", $request->input('specifics',[]));
        $priority = implode (" ", $request->input('priority',[]));
        $prices = implode (" ", $request->input('prices',[])); 
        $prices_sum = array_sum ($request->input('prices',[]));
        $quantities_sum = array_sum ($request->input('quantities',[]));
        $taken_by = Auth::user();
        Log::info($taken_by);
        $new_order = new Order;
        
        $new_order->taken_by = $taken_by;
        $new_order->table_number = $request->table_number;
        $new_order->specifics = $specifics;
        $new_order->priority = $priority;
        $new_order->quantities = $quantities;
        $new_order->qunatities_total = $quantities_sum;
        $new_order->prices = $prices;
        $new_order->prices_total = $prices_sum;
            

        // for ($product=0; $product < count($products); $product++) {
        //     if ($products[$product] != '') {
        //         $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
        //     }
        // }
        
        Log::info($new_order);

        $new_order->save();

        

        return redirect('/create-order')->with('success', 'Order Successfully Placed!');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::all();

        $order->load('items');

        return view('admin.orders.edit', compact('items', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        $order->items()->detach();
        $items = $request->input('items', []);
        $quantities = $request->input('quantities', []);
        for ($item=0; $item < count($items); $item++) {
            if ($items[$item] != '') {
                $order->items()->attach($items[$item], ['quantity' => $quantities[$item]]);
            }
        }

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('items');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }



    
}
