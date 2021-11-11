<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.table.index');
    }

    public function create()
    {
        abort_if(Gate::denies('table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.table.create');
    }

    public function edit(Table $table)
    {
        abort_if(Gate::denies('table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.table.edit', compact('table'));
    }

    public function show(Table $table)
    {
        abort_if(Gate::denies('table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.table.show', compact('table'));
    }
}
