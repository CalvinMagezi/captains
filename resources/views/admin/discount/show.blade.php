@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.discount.title_singular') }}:
                    {{ trans('cruds.discount.fields.id') }}
                    {{ $discount->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.id') }}
                            </th>
                            <td>
                                {{ $discount->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.type') }}
                            </th>
                            <td>
                                {{ $discount->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.status') }}
                            </th>
                            <td>
                                {{ $discount->status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.percentage') }}
                            </th>
                            <td>
                                {{ $discount->percentage }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.start') }}
                            </th>
                            <td>
                                {{ $discount->start }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.end') }}
                            </th>
                            <td>
                                {{ $discount->end }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.repeat') }}
                            </th>
                            <td>
                                {{ $discount->repeat_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.discount.fields.happy_hour') }}
                            </th>
                            <td>
                                {{ $discount->happy_hour_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('discount_edit')
                    <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection