@extends('layouts.dashboard')
@section('content')
<div class="w-full">
        @livewire('dashboard-stats')
        @livewire('table-mapping')
        @livewire('latest-orders')
</div>
@endsection
