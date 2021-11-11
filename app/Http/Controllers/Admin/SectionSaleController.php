<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionSale;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionSaleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('section_sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section-sale.index');
    }

    public function create()
    {
        abort_if(Gate::denies('section_sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section-sale.create');
    }

    public function edit(SectionSale $sectionSale)
    {
        abort_if(Gate::denies('section_sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section-sale.edit', compact('sectionSale'));
    }

    public function show(SectionSale $sectionSale)
    {
        abort_if(Gate::denies('section_sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sectionSale->load('section');

        return view('admin.section-sale.show', compact('sectionSale'));
    }
}
