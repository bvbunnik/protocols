@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-database"></i> {{ trans('navs.frontend.food') }}
                </div>

                <div class="panel-body">
                    <table class="table table-bordered" id="protocols-table">
                        <thead>
                        <tr>
                            <th title="Field #1">Host species</th>
                            <th title="Field #2">Food item</th>
                            <th title="Field #3">Live/Dead</th>
                            <th title="Field #4">Matrix</th>
                            <th title="Field #5">Target Pathogen or Syndrome</th>
                            <th title="Field #6">Scientific name</th>
                            <th title="Field #7">Protocol(s)</th>
                            <th title="Field #8">Source</th>
                            <th title="Field #9">Comments</th>
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
                "bPaginate": false,
                "dom": 'lrtip',

                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("frontend.protocols.get") }}',
                    type: 'get',
                    data: {protocol: "food"}
                },
                columns: [
                    {data: 'host', name: 'host'},
                    {data: 'food_item', name: 'food_item'},
                    {data: 'live_dead', name: 'live_dead'},
                    {data: 'matrix', name: 'matrix'},
                    {data: 'target_pathogen', name: 'target_pathogen'},
                    {data: 'scientific_name', name: 'scientific_name'},
                    {data: 'protocols', name: 'protocols'},
                    {data: 'source', name: 'source'},
                    {data: 'comments', name: 'comments'}
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