@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-title">@lang('quickadmin.roles.title') /
            @isset($user)
                @lang('quickadmin.qa_edit')
            @else
                @lang('quickadmin.qa_create')
            @endisset
        </h3>
        @isset($role)
            {!! Form::model($role, ['method' => 'PUT', 'route' => ['admin.roles.update', $role->id], 'autocomplete' => 'off']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'route' => ['admin.roles.store'], 'autocomplete' => 'off']) !!}
        @endisset


        <div class="row">
            <div class="col-xs-12 input-field">
                {!! Form::text('title', old('title'), ['placeholder' => '', 'required' => '']) !!}
                {!! Form::label('title', trans('quickadmin.roles.fields.title').' *', []) !!}
                <p class="help-block"></p>
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
            </div>
        </div>

        @isset($user)
            {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'waves-effect waves-light btn']) !!}
        @else
            {!! Form::submit(trans('quickadmin.qa_create'), ['class' => 'waves-effect waves-light btn']) !!}
        @endisset
        {!! Form::close() !!}
    </div>
@stop

