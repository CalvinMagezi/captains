<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.type.create');
    }

    public function edit(Type $type)
    {
        abort_if(Gate::denies('type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.type.edit', compact('type'));
    }

    public function show(Type $type)
    {
        abort_if(Gate::denies('type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $type->load('dispatchedTo');

        return view('admin.type.show', compact('type'));
    }
}
