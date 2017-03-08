@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-2">
            <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                    </ul>
                </div>
            @endif
        </div>
    </div>

    {!! Form::model($categories, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.categories.update', $categories->id))) !!}

    <div class="form-group">
        {!! Form::label('name', 'name*', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name',$categories->name), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('showhide', 'showhide', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::select('showhide', $showhide, old('showhide',$categories->showhide), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('picture', 'picture', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('picture') !!}
            {!! Form::hidden('picture_w', 4096) !!}
            {!! Form::hidden('picture_h', 4096) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('parent_id', 'parent_id', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('parent_id', old('parent_id',$categories->parent_id), array('class'=>'form-control')) !!}

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.categories.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection