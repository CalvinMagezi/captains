@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.sectionSale.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('section_sale_create')
                    <a class="btn btn-indigo" href="{{ route('admin.section-sales.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.sectionSale.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('section-sale.index')

    </div>
</div>
@endsection