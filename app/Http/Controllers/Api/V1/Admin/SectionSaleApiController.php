<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionSaleRequest;
use App\Http\Requests\UpdateSectionSaleRequest;
use App\Http\Resources\Admin\SectionSaleResource;
use App\Models\SectionSale;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionSaleApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('section_sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SectionSaleResource(SectionSale::with(['section'])->get());
    }

    public function store(StoreSectionSaleRequest $request)
    {
        $sectionSale = SectionSale::create($request->validated());

        return (new SectionSaleResource($sectionSale))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SectionSale $sectionSale)
    {
        abort_if(Gate::denies('section_sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SectionSaleResource($sectionSale->load(['section']));
    }

    public function update(UpdateSectionSaleRequest $request, SectionSale $sectionSale)
    {
        $sectionSale->update($request->validated());

        return (new SectionSaleResource($sectionSale))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SectionSale $sectionSale)
    {
        abort_if(Gate::denies('section_sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sectionSale->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
