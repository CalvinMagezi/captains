<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Item;
use Gate;
use DB;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;

class AdminController extends Controller
{
    public function index(){

        $users = User::all();
        $orders = Order::all();
        
        return view('admin.dashboard', [
            'users' => $users,
            'orders' => $orders,
        ]);
    }



    public function show_create(Request $request){


        if ($request->wantsJson()) {
            return response(
                $request->user()->cart()->get()
            );
        }
        $orders = DB::table('orders')->select('*')->paginate(5);

        return view('admin.create-order', [
            'orders' => $orders,
        ]);
    }

    public function create()
    {

        $items = Item::all();

        return view('admin.orders.create', compact('items'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        //Check if order was placed from one of the registered IP's
        $ipAddress = $request->ip();

        $items = $request->input('items', []);
        $quantities = $request->input('quantities', []);

        
        for ($item=0; $item < count($items); $item++) {
            if ($items[$item] != '') {
                $order->items()->attach($items[$item], ['quantity' => $quantities[$item]]);
            }
        }

        return redirect()->route('admin.orders.index');
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
