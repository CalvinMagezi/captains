@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.customer.title_singular') }}:
                    {{ trans('cruds.customer.fields.id') }}
                    {{ $customer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.id') }}
                            </th>
                            <td>
                                {{ $customer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.unique_key') }}
                            </th>
                            <td>
                                @if($customer->uniqueKey)
                                    <span class="badge badge-relationship">{{ $customer->uniqueKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.orders_placed') }}
                            </th>
                            <td>
                                {{ $customer->orders_placed }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.favorite_drink') }}
                            </th>
                            <td>
                                {{ $customer->favorite_drink }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.favorite_food') }}
                            </th>
                            <td>
                                {{ $customer->favorite_food }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.favorite_time') }}
                            </th>
                            <td>
                                {{ $customer->favorite_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.favorite_waiter') }}
                            </th>
                            <td>
                                @if($customer->favoriteWaiter)
                                    <span class="badge badge-relationship">{{ $customer->favoriteWaiter->staff_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('customer_edit')
                    <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection