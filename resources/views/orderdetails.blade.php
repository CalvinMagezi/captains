@extends('layouts.dashboard')
@section('content')
@livewire('edit-order', ["order_id" => $id])
@endsection
