@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.staff.title_singular') }}:
                    {{ trans('cruds.staff.fields.id') }}
                    {{ $staff->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('staff.edit', [$staff])
        </div>
    </div>
</div>
@endsection