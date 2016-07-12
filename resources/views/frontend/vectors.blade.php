@extends('frontend.layouts.master')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
    {{ Html::style("https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css") }}

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-database"></i> {{ trans('navs.frontend.vectors') }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-bordered" id="protocols">
                        <thead>
                        <tr>
                            <th title="Field #1">Vector</th>
                            <th title="Field #2">Scientific name</th>
                            <th title="Field #3">Species (most important)</th>
                            <th title="Field #4">Target Pathogen</th>
                            <th title="Field #5">Scientific Name</th>
                            <th title="Field #6">Disease</th>
                            <th title="Field #7">Protocol(s)</th>
                            <th title="Field #8">Source</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- panel -->
        </div><!-- col-md-10 -->
    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            var table = $('#protocols').DataTable({
                lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                //lengthChange: false,
                buttons: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("frontend.protocols.get") }}',
                    type: 'get',
                    data: {protocol: "vector"}
                },
                columns: [
                    {data: 'vector', name: 'vector'},
                    {data: 'vector_scientific_name', name: 'vector_scientific_name'},
                    {data: 'species', name: 'species'},
                    {data: 'target_pathogen', name: 'target_pathogen'},
                    {data: 'pathogen_scientific_name', name: 'pathogen_scientific_name'},
                    {data: 'disease', name: 'disease'},
                    {data: 'protocols', name: 'protocols'},
                    {data: 'source', name: 'source'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
            new $.fn.dataTable.Buttons( table, {
                buttons: [{extend: 'copyHtml5', text: 'Copy to clipboard'},
                    {extend: 'csvHtml5', text: 'Save as CSV'},
                    {extend: 'pdfHtml5', text: 'Save as PDF'}]
            });

            table.buttons().container().prependTo(
                    table.table().container()
            );
        } );
    </script>

@stop