@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.staff.title_singular') }}:
                    {{ trans('cruds.staff.fields.id') }}
                    {{ $staff->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.id') }}
                            </th>
                            <td>
                                {{ $staff->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.staff_number') }}
                            </th>
                            <td>
                                {{ $staff->staff_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.user_key') }}
                            </th>
                            <td>
                                @if($staff->userKey)
                                    <span class="badge badge-relationship">{{ $staff->userKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.tables_in_charge_of') }}
                            </th>
                            <td>
                                {{ $staff->tables_in_charge_of_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.casuals_assigned') }}
                            </th>
                            <td>
                                {{ $staff->casuals_assigned_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.color_code') }}
                            </th>
                            <td>
                                {{ $staff->color_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.clocked_in') }}
                            </th>
                            <td>
                                {{ $staff->clocked_in }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staff.fields.clocked_out') }}
                            </th>
                            <td>
                                {{ $staff->clocked_out }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('staff_edit')
                    <a href="{{ route('admin.staff.edit', $staff) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection