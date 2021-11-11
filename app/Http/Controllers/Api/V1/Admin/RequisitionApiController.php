<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Http\Resources\Admin\RequisitionResource;
use App\Models\Requisition;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequisitionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('requisition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequisitionResource(Requisition::with(['for'])->get());
    }

    public function store(StoreRequisitionRequest $request)
    {
        $requisition = Requisition::create($request->validated());

        return (new RequisitionResource($requisition))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequisitionResource($requisition->load(['for']));
    }

    public function update(UpdateRequisitionRequest $request, Requisition $requisition)
    {
        $requisition->update($request->validated());

        return (new RequisitionResource($requisition))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
