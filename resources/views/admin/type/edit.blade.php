@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.type.title_singular') }}:
                    {{ trans('cruds.type.fields.id') }}
                    {{ $type->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('type.edit', [$type])
        </div>
    </div>
</div>
@endsection