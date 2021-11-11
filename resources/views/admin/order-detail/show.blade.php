@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orderDetail.title_singular') }}:
                    {{ trans('cruds.orderDetail.fields.id') }}
                    {{ $orderDetail->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.id') }}
                            </th>
                            <td>
                                {{ $orderDetail->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.order_key') }}
                            </th>
                            <td>
                                @if($orderDetail->orderKey)
                                    <span class="badge badge-relationship">{{ $orderDetail->orderKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.product_key') }}
                            </th>
                            <td>
                                @if($orderDetail->productKey)
                                    <span class="badge badge-relationship">{{ $orderDetail->productKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.quantity') }}
                            </th>
                            <td>
                                {{ $orderDetail->quantity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.unit_price') }}
                            </th>
                            <td>
                                {{ $orderDetail->unit_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.amount') }}
                            </th>
                            <td>
                                {{ $orderDetail->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.discount') }}
                            </th>
                            <td>
                                {{ $orderDetail->discount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.dispatched_to') }}
                            </th>
                            <td>
                                {{ $orderDetail->dispatched_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.ready') }}
                            </th>
                            <td>
                                {{ $orderDetail->ready_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.specifics') }}
                            </th>
                            <td>
                                {{ $orderDetail->specifics }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orderDetail.fields.priority') }}
                            </th>
                            <td>
                                {{ $orderDetail->priority }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('order_detail_edit')
                    <a href="{{ route('admin.order-details.edit', $orderDetail) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.order-details.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection