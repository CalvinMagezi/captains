@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.order.title_singular') }}:
                    {{ trans('cruds.order.fields.id') }}
                    {{ $order->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.id') }}
                            </th>
                            <td>
                                {{ $order->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.unique_key') }}
                            </th>
                            <td>
                                {{ $order->unique_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.status') }}
                            </th>
                            <td>
                                {{ $order->status }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.taken_by') }}
                            </th>
                            <td>
                                {{ $order->taken_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.closed_by') }}
                            </th>
                            <td>
                                {{ $order->closed_by }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.table_number') }}
                            </th>
                            <td>
                                {{ $order->table_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.extra_notes') }}
                            </th>
                            <td>
                                {{ $order->extra_notes }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.total_amount') }}
                            </th>
                            <td>
                                {{ $order->total_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.amount_received') }}
                            </th>
                            <td>
                                {{ $order->amount_received }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.completed_at') }}
                            </th>
                            <td>
                                {{ $order->completed_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_edit')
                    <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection