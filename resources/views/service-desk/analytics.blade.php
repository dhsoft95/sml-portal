@extends('layouts.app')

{{-- @section('title', 'Your Page Title') --}}

@section('content')
    <livewire:layout.inc.layout-wrapper />
    <livewire:layout.navigation />
    <livewire:analytics />
@endsection

@push('styles')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Custom Styles -->
@endpush

@push('scripts')

@endpush

@section('page-specific-scripts')
@endsection
