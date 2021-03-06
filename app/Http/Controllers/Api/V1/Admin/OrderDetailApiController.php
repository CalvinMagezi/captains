<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Http\Resources\Admin\OrderDetailResource;
use App\Models\OrderDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderDetailResource(OrderDetail::with(['orderKey', 'productKey'])->get());
    }

    public function store(StoreOrderDetailRequest $request)
    {
        $orderDetail = OrderDetail::create($request->validated());

        return (new OrderDetailResource($orderDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderDetailResource($orderDetail->load(['orderKey', 'productKey']));
    }

    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $orderDetail->update($request->validated());

        return (new OrderDetailResource($orderDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
