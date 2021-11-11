<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequisitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('requisition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requisition.index');
    }

    public function create()
    {
        abort_if(Gate::denies('requisition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requisition.create');
    }

    public function edit(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.requisition.edit', compact('requisition'));
    }

    public function show(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->load('for');

        return view('admin.requisition.show', compact('requisition'));
    }
}
