@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.cart.title_singular') }}:
                    {{ trans('cruds.cart.fields.id') }}
                    {{ $cart->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.cart.fields.id') }}
                            </th>
                            <td>
                                {{ $cart->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cart.fields.product_key') }}
                            </th>
                            <td>
                                @if($cart->productKey)
                                    <span class="badge badge-relationship">{{ $cart->productKey->unique_key ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cart.fields.product_qty') }}
                            </th>
                            <td>
                                {{ $cart->product_qty }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cart.fields.product_price') }}
                            </th>
                            <td>
                                {{ $cart->product_price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.cart.fields.user_key') }}
                            </th>
                            <td>
                                {{ $cart->user_key }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('cart_edit')
                    <a href="{{ route('admin.carts.edit', $cart) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.carts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection