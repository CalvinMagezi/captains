<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staff_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff.create');
    }

    public function edit(Staff $staff)
    {
        abort_if(Gate::denies('staff_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff.edit', compact('staff'));
    }

    public function show(Staff $staff)
    {
        abort_if(Gate::denies('staff_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staff->load('userKey');

        return view('admin.staff.show', compact('staff'));
    }
}
