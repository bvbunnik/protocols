@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $protocol->name }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <table class="table-striped table">
                <thead>
                <?php
                    $columns = json_decode($protocol->table_columns);
                ?>
                <th>Id</th>
                @foreach ($columns->columns as $column)
                    <th>{!! $column !!}</th>
                @endforeach
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                        @foreach($item as $it)
                        <td>{{ $it }}</td>
                        @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection