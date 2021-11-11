@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.table.title_singular') }}:
                    {{ trans('cruds.table.fields.id') }}
                    {{ $table->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('table.edit', [$table])
        </div>
    </div>
</div>
@endsection