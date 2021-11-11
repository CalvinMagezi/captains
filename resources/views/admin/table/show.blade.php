@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.table.title_singular') }}:
                    {{ trans('cruds.table.fields.id') }}
                    {{ $table->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.id') }}
                            </th>
                            <td>
                                {{ $table->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.table_number') }}
                            </th>
                            <td>
                                {{ $table->table_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.qr_code') }}
                            </th>
                            <td>
                                {{ $table->qr_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.managed_by') }}
                            </th>
                            <td>
                                {{ $table->managed_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.table_key') }}
                            </th>
                            <td>
                                {{ $table->table_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.color_code') }}
                            </th>
                            <td>
                                {{ $table->color_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.order') }}
                            </th>
                            <td>
                                {{ $table->order }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.section') }}
                            </th>
                            <td>
                                {{ $table->section }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.position') }}
                            </th>
                            <td>
                                {{ $table->position }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.status') }}
                            </th>
                            <td>
                                {{ $table->status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.top') }}
                            </th>
                            <td>
                                {{ $table->top }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.table.fields.left') }}
                            </th>
                            <td>
                                {{ $table->left }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('table_edit')
                    <a href="{{ route('admin.tables.edit', $table) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.tables.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection