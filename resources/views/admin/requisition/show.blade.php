@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.requisition.title_singular') }}:
                    {{ trans('cruds.requisition.fields.id') }}
                    {{ $requisition->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.id') }}
                            </th>
                            <td>
                                {{ $requisition->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.name') }}
                            </th>
                            <td>
                                {{ $requisition->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.for') }}
                            </th>
                            <td>
                                @if($requisition->for)
                                    <span class="badge badge-relationship">{{ $requisition->for->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.amount') }}
                            </th>
                            <td>
                                {{ $requisition->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.specifics') }}
                            </th>
                            <td>
                                {{ $requisition->specifics }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.latest_date') }}
                            </th>
                            <td>
                                {{ $requisition->latest_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.completed_on') }}
                            </th>
                            <td>
                                {{ $requisition->completed_on }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.approved_by') }}
                            </th>
                            <td>
                                {{ $requisition->approved_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.requisition.fields.approved_on') }}
                            </th>
                            <td>
                                {{ $requisition->approved_on }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('requisition_edit')
                    <a href="{{ route('admin.requisitions.edit', $requisition) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.requisitions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection