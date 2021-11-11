<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSmsRequest;
use App\Http\Requests\UpdateSmsRequest;
use App\Http\Resources\Admin\SmsResource;
use App\Models\Sms;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SmsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sms_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmsResource(Sms::with(['keyword', 'table', 'requestedWaiter'])->get());
    }

    public function store(StoreSmsRequest $request)
    {
        $sms = Sms::create($request->validated());

        return (new SmsResource($sms))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sms $sms)
    {
        abort_if(Gate::denies('sms_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SmsResource($sms->load(['keyword', 'table', 'requestedWaiter']));
    }

    public function update(UpdateSmsRequest $request, Sms $sms)
    {
        $sms->update($request->validated());

        return (new SmsResource($sms))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sms $sms)
    {
        abort_if(Gate::denies('sms_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sms->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
