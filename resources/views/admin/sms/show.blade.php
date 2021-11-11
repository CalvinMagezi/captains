@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.sms.title_singular') }}:
                    {{ trans('cruds.sms.fields.id') }}
                    {{ $sms->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.id') }}
                            </th>
                            <td>
                                {{ $sms->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.placed_by') }}
                            </th>
                            <td>
                                {{ $sms->placed_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.unique_key') }}
                            </th>
                            <td>
                                {{ $sms->unique_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.keyword') }}
                            </th>
                            <td>
                                @if($sms->keyword)
                                    <span class="badge badge-relationship">{{ $sms->keyword->sms_keyword ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.time') }}
                            </th>
                            <td>
                                {{ $sms->time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.table') }}
                            </th>
                            <td>
                                @if($sms->table)
                                    <span class="badge badge-relationship">{{ $sms->table->table_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.sms.fields.requested_waiter') }}
                            </th>
                            <td>
                                @if($sms->requestedWaiter)
                                    <span class="badge badge-relationship">{{ $sms->requestedWaiter->staff_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('sms_edit')
                    <a href="{{ route('admin.sms.edit', $sms) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sms.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection