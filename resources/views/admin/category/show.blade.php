@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.category.title_singular') }}:
                    {{ trans('cruds.category.fields.id') }}
                    {{ $category->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.category.fields.id') }}
                            </th>
                            <td>
                                {{ $category->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.category.fields.name') }}
                            </th>
                            <td>
                                {{ $category->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.category.fields.unique_key') }}
                            </th>
                            <td>
                                {{ $category->unique_key }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.category.fields.description') }}
                            </th>
                            <td>
                                {{ $category->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.category.fields.dispatched_to') }}
                            </th>
                            <td>
                                @if($category->dispatchedTo)
                                    <span class="badge badge-relationship">{{ $category->dispatchedTo->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('category_edit')
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection