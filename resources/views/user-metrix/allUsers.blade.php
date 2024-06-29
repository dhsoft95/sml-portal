@extends('layouts.app')

{{-- @section('title', 'Your Page Title') --}}

@section('content')
    <livewire:layout.inc.layout-wrapper />
    <livewire:layout.navigation />
    <livewire:user-list />
@endsection

@push('styles')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Custom Styles -->
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
{{--    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                paging: false,
                scrollY: '50vh',
                dom: 'Bfrtip',
                layout: {
                    topStart: {
                        buttons: [
                            // 'copy', 'excel', 'pdf'
                        ]
                    }
                }
            });
        });
    </script>
@endpush

@section('page-specific-scripts')
@endsection
