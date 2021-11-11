<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('discount_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discount.index');
    }

    public function create()
    {
        abort_if(Gate::denies('discount_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discount.create');
    }

    public function edit(Discount $discount)
    {
        abort_if(Gate::denies('discount_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discount.edit', compact('discount'));
    }

    public function show(Discount $discount)
    {
        abort_if(Gate::denies('discount_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.discount.show', compact('discount'));
    }
}
