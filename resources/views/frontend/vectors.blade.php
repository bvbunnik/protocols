@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-database"></i> {{ trans('navs.frontend.vectors') }}
                </div>

                <div class="panel-body">
                    <table class="table table-bordered" id="protocols-table">
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

            $('#search').on( 'keyup', function () {
                table.search( this.value ).draw();
            } );
        } );
    </script>
@stop