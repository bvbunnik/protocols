@extends('frontend.layouts.master')

@section('after-styles-end')
    <style>
        .form-inline .form-group input {
            width:500px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline">
                <div class="form-group">
                    <label for="search">Filter the results in the table:</label>
                    <input type="text" width="100%" class="form-control" id="search">
                </div>
            </form>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-database"></i> {{ trans('navs.frontend.human_animals') }}
                </div>

                <div class="panel-body">
                    <table class="table table-bordered" id="protocols-table">
                        <thead>
                        <tr>
                            <th title="Field #1">Domestic / Free-ranging / Not Applicable (NA)</th>
                            <th title="Field #2">Host species</th>
                            <th title="Field #3">In-vivo (IV) / Post-mortem (PM)</th>
                            <th title="Field #4">Disease or Syndrome</th>
                            <th title="Field #5">Pathogen type</th>
                            <th title="Field #6">Pathogen species</th>
                            <th title="Field #7">Protocol(s)</th>
                            <th title="Field #8">Source</th>
                            <th title="Field #9">Comments</th>
                            <th title="Field #10">Notifiable</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->



    </div><!--row-->
@endsection

@section('after-scripts-end')
    {{ Html::script("https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js") }}
    {{ Html::script("https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js") }}
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
                "dom": 'Blrtip',
                buttons: [
                    {extend: 'copy', text: 'Copy to clipboard'},
                    {extend: 'csv', text: 'Save as CSV'},
                    {extend: 'pdfHtml5', text: 'Save as PDF'}
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("frontend.protocols.get") }}',
                    type: 'get',
                    data: {protocol: "combined"}
                },
                columns: [
                    {data: 'type', name: 'type'},
                    {data: 'host_species', name: 'host_species'},
                    {data: 'diagnosis', name: 'diagnosis'},
                    {data: 'disease', name: 'disease'},
                    {data: 'pathogen_type', name: 'pathogen_type'},
                    {data: 'pathogen_species', name: 'pathogen_species'},
                    {data: 'protocols', name: 'protocols'},
                    {data: 'source', name: 'source'},
                    {data: 'comments', name: 'comments'},
                    {data: 'notifiable', name: 'notifiable'}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });

            $('#search').on( 'keyup', function () {
                table.search( this.value ).draw();
            } );
        } );
    </script>
@stop