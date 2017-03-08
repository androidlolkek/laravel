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

    {!! Form::model($tovars, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.tovars.update', $tovars->id))) !!}

    <div class="form-group">
        {!! Form::label('name', 'name*', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name',$tovars->name), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('body', 'body', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('body', old('body',$tovars->body), array('class'=>'form-control ckeditor')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('picture', 'picture', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('picture') !!}
            {!! Form::hidden('picture_w', 4096) !!}
            {!! Form::hidden('picture_h', 4096) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('categories_id', 'cat_id', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::select('categories_id', $categories, old('categories_id',$tovars->categories_id), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('showhide', 'showhide', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::select('showhide', $showhide, old('showhide',$tovars->showhide), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('url', 'url', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('url', old('url',$tovars->url), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('price', 'price', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('price', old('price',$tovars->price), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('user_id', 'user_id', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::select('user_id', $user, old('user_id',$tovars->user_id), array('class'=>'form-control')) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.tovars.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection