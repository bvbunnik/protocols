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
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(document).ready(function() {
            var table = $('#protocols-table').DataTable({
                "bPaginate": true,
                "dom": 'lrtip',

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