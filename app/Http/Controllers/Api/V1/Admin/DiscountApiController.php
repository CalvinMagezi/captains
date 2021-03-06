<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Http\Resources\Admin\DiscountResource;
use App\Models\Discount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscountResource(Discount::all());
    }

    public function store(StoreDiscountRequest $request)
    {
        $discount = Discount::create($request->validated());

        return (new DiscountResource($discount))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Discount $discount)
    {
        abort_if(Gate::denies('discount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DiscountResource($discount);
    }

    public function update(UpdateDiscountRequest $request, Discount $discount)
    {
        $discount->update($request->validated());

        return (new DiscountResource($discount))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Discount $discount)
    {
        abort_if(Gate::denies('discount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $discount->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
