@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-database"></i> {{ trans('navs.frontend.transport') }}
                </div>

                <div class="panel-body">
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

            $('#search').on( 'keyup', function () {
                table.search( this.value ).draw();
            } );
        } );
    </script>
@stop