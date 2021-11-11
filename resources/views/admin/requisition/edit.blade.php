@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.requisition.title_singular') }}:
                    {{ trans('cruds.requisition.fields.id') }}
                    {{ $requisition->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('requisition.edit', [$requisition])
        </div>
    </div>
</div>
@endsection