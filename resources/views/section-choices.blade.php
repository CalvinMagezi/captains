@extends('layouts.dashboard')
@section('content')
<div class="w-full h-32 text-center bg-black bg-opacity-25">
    <h1 class="pt-10 font-bold">{{ strtoupper($section) }} ORDERS</h1>
</div>

@livewire('section-products', ['dispatched_to' => Str::replace('-',' ',$section)])
<div class="w-full h-24"></div>
@livewire('table-mapping')

@endsection
