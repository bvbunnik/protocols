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
            <h3 class="box-title">Protocols</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="protocols-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>Protocol group</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($protocols as $protocol)
                        <tr>
                            <td>{{$protocol->name}}</td>
                            <td>
                                <a href="{{route('admin.protocols.destroy', $protocol->id) }}"
                                   data-method="delete" data-trans-button-cancel="{{trans('buttons.general.cancel')}}"
                                   data-trans-button-confirm="{{trans('buttons.general.crud.delete')}}"
                                   data-trans-title="{{trans('strings.backend.general.are_you_sure')}}"
                                   class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="{{trans('buttons.general.crud.delete')}}"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
            <a href="{{route('admin.protocols.create')}}" class="btn btn-success">Add new protocol list</a>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection