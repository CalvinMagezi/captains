@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.transaction.title_singular') }}:
                    {{ trans('cruds.transaction.fields.id') }}
                    {{ $transaction->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.id') }}
                            </th>
                            <td>
                                {{ $transaction->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.order_key') }}
                            </th>
                            <td>
                                {{ $transaction->order_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.paid_amount') }}
                            </th>
                            <td>
                                {{ $transaction->paid_amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.balance') }}
                            </th>
                            <td>
                                {{ $transaction->balance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.payment_method') }}
                            </th>
                            <td>
                                {{ $transaction->payment_method }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.handled_by') }}
                            </th>
                            <td>
                                @if($transaction->handledBy)
                                    <span class="badge badge-relationship">{{ $transaction->handledBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.transac_date') }}
                            </th>
                            <td>
                                {{ $transaction->transac_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.transaction.fields.transac_amount') }}
                            </th>
                            <td>
                                {{ $transaction->transac_amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('transaction_edit')
                    <a href="{{ route('admin.transactions.edit', $transaction) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection