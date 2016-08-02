@extends('frontend.layouts.master')

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-database"></i> {{ $protocol1[0]->name }}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="protocols-table">
                        <thead>
                        <tr>
                            @foreach($table_columns->columns as $column)
                            <th> {{$column}}</th>
                            @endforeach
                        </tr>
                        </thead>
                    </table>
                </div> <!-- <box body> -->
            </div><!-- box box-primary -->
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
                    data: {protocol: "{{$protocol1[0]->table_name}}"}
                },
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
    <script>
        console.log(protocol_name);
    </script>
@stop