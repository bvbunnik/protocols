@extends('frontend.layouts.master')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-database"></i> {{ trans('navs.frontend.transport') }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="protocols-table">
                        <thead>
                        <tr>
                            <th title="Field #1">Animal /Human</th>
                            <th title="Field #2">Transport / Storage / Other</th>
                            <th title="Field #3">Title</th>
                            <th title="Field #4">Link</th>
                            <th title="Field #5">Source</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- panel -->
        </div><!-- col-md-10 -->
    </div><!--row-->
@endsection

@section('after-scripts-end')
    <script src="http://protocols.local/js/backend/plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="http://protocols.local/js/backend/plugin/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#protocols-table').DataTable({
                "paging": true,
                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                "search": true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("frontend.protocols.get") }}',
                    type: 'get',
                    data: {protocol: "transport"}
                },
                columns: [
                    {data: 'host', name: 'host'},
                    {data: 'type', name: 'type'},
                    {data: 'title', name: 'title'},
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