@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.sectionSale.title_singular') }}:
                    {{ trans('cruds.sectionSale.fields.id') }}
                    {{ $sectionSale->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('section-sale.edit', [$sectionSale])
        </div>
    </div>
</div>
@endsection