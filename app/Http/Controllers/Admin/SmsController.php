<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sms;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SmsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sms_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sms.create');
    }

    public function edit(Sms $sms)
    {
        abort_if(Gate::denies('sms_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sms.edit', compact('sms'));
    }

    public function show(Sms $sms)
    {
        abort_if(Gate::denies('sms_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sms->load('keyword', 'table', 'requestedWaiter');

        return view('admin.sms.show', compact('sms'));
    }
}
