<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Item;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function index()
    {       

        $orders = Order::with('items')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
       // abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::all();

        return view('admin.create-order', compact('items'));
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::create([
            'table_number' => $request->table_number,
            'item_name'    => $request->item_name,
            'specifics'    => $request->specifics,
            'priority'     => $request->priority,
            'taken_by'     => $request->user()->name,
        ]);

        $cart = $request->user()->cart()->get();
        foreach ($cart as $item) {
            $order->items()->create([
                'price' => $item->price,
                'quantity' => $item->pivot->quantity,
                'product_id' => $item->id,
            ]);
            $item->quantity = $item->quantity - $item->pivot->quantity;
            $item->save();
        }
        $request->user()->cart()->detach();
        $order->payments()->create([
            'amount' => $request->amount,
            'user_id' => $request->user()->id,
        ]);
        return 'success';
    }

    public function edit(Order $order)
    {
        //abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
       // abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('items');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
       // abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
