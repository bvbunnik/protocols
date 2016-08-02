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
            <h3 class="box-title">Add a protocol list</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {{ Form::open(['route' => 'admin.protocols.preview', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files' => true]) }}
            <div class="form-group">
                {{Form::label('name', "Protocol list name:", ['class' => 'col-lg-2 control-label'])}}
                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Title"]) }}
                </div><!--col-lg-10-->
            </div>
            <div class="form-group">
                {{Form::label('csv-import', "Upload CSV-file:", ['class' => 'col-lg-2 control-label'])}}
                <div class="col-lg-10">
                    {{ Form::file('csv-import') }}
                </div><!--col-lg-10-->
                <div class="clearfix"></div>
                <div class="col-lg-2">{{Form::label('dummy', "&nbsp;", ['class' => 'col-lg-2 control-label'])}}</div>
                <div class="col-lg-10">
                    <p class="help-block">Please specify a csv-file (comma separated values (*.csv))</p>
                </div>

            </div>
            <div class="form-group">
                {{Form::label('header', "Column names (separated by comma):", ['class' => 'col-lg-2 control-label'])}}
                <div class="col-lg-10">
                    {{ Form::text('header', null, ['class' => 'form-control']) }}
                </div><!--col-lg-10-->
                <div class="col-lg-2"></div>
                <div class="col-lg-10">
                    <p class="help-block">E.g. type, host_species, diagnosis, disease, pathogen_type, pathogen_species, protocols, source, comments, notifiable<br />
                    These should match up with the first line in your csv-file!</p>
                </div>
            </div>
            <div class="pull-left">
                {{ Form::submit('Create...', ['class' => 'btn btn-success']) }}
            </div><!--pull-left-->
            {{Form::close()}}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection