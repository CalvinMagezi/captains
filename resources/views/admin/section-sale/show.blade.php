@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.sectionSale.title_singular') }}:
                    {{ trans('cruds.sectionSale.fields.id') }}
                    {{ $sectionSale->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.id') }}
                            </th>
                            <td>
                                {{ $sectionSale->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.section') }}
                            </th>
                            <td>
                                @if($sectionSale->section)
                                    <span class="badge badge-relationship">{{ $sectionSale->section->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.todays_sales') }}
                            </th>
                            <td>
                                {{ $sectionSale->todays_sales }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.yesterdays_sales') }}
                            </th>
                            <td>
                                {{ $sectionSale->yesterdays_sales }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.weeks_sales') }}
                            </th>
                            <td>
                                {{ $sectionSale->weeks_sales }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.months_sales') }}
                            </th>
                            <td>
                                {{ $sectionSale->months_sales }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sectionSale.fields.years_sales') }}
                            </th>
                            <td>
                                {{ $sectionSale->years_sales }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('section_sale_edit')
                    <a href="{{ route('admin.section-sales.edit', $sectionSale) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.section-sales.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection