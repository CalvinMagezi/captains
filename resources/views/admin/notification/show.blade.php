@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.notification.title_singular') }}:
                    {{ trans('cruds.notification.fields.id') }}
                    {{ $notification->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.id') }}
                            </th>
                            <td>
                                {{ $notification->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.unique_key') }}
                            </th>
                            <td>
                                {{ $notification->unique_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.for') }}
                            </th>
                            <td>
                                {{ $notification->for }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.from') }}
                            </th>
                            <td>
                                {{ $notification->from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.purpose') }}
                            </th>
                            <td>
                                {{ $notification->purpose }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.time') }}
                            </th>
                            <td>
                                {{ $notification->time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.completed') }}
                            </th>
                            <td>
                                {{ $notification->completed_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.notification.fields.message') }}
                            </th>
                            <td>
                                {{ $notification->message }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('notification_edit')
                    <a href="{{ route('admin.notifications.edit', $notification) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.notifications.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection