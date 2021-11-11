@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.type.title_singular') }}:
                    {{ trans('cruds.type.fields.id') }}
                    {{ $type->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.type.fields.id') }}
                            </th>
                            <td>
                                {{ $type->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.type.fields.name') }}
                            </th>
                            <td>
                                {{ $type->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.type.fields.unique_key') }}
                            </th>
                            <td>
                                {{ $type->unique_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.type.fields.dispatched_to') }}
                            </th>
                            <td>
                                @if($type->dispatchedTo)
                                    <span class="badge badge-relationship">{{ $type->dispatchedTo->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.type.fields.description') }}
                            </th>
                            <td>
                                {{ $type->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('type_edit')
                    <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection