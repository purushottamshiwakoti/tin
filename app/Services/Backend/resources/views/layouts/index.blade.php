@extends('backend::layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ public_asset('admin/assets/css/pages.css')}}">
    @yield('css')
@stop    
@section('content')
    @yield('content')
@stop
@section('javascript')
    <script>
        // $(document).ready(function () {
            var current_url = "{{ url()->current() }}";
            var current_data_url = "{{ url()->current().'/get-data' }}";
            console.log(current_data_url);
        // });
    </script>


    <!-- data-table js -->
    <script src="{{ public_asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ public_asset('admin/assets/pages/data-table/js/jszip.min.js')}}"></script>
    <script src="{{ public_asset('admin/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
    <script src="{{ public_asset('admin/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ public_asset('admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ public_asset('admin/assets/pages/data-table/js/data-table-custom.js')}}"></script>]
    <script src="{{ public_asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    @yield('js');
@stop