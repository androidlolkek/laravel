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

    {!! Form::model($orders, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.orders.update', $orders->id))) !!}

    <div class="form-group">
        {!! Form::label('user_id', 'user_id', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::select('user_id', $user, old('user_id',$orders->user_id), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('body', 'body', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('body', old('body',$orders->body), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('status', 'status', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('status', old('status',$orders->status), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('phone', 'phone*', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('phone', old('phone',$orders->phone), array('class'=>'form-control')) !!}

        </div>
    </div><div class="form-group">
        {!! Form::label('contacts', 'contacts', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('contacts', old('contacts',$orders->contacts), array('class'=>'form-control')) !!}

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.orders.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection