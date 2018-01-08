@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-title">@lang('quickadmin.users.title') /
            @isset($user)
                @lang('quickadmin.qa_edit')
            @else
                @lang('quickadmin.qa_create')
            @endisset
        </h3>

        @isset($user)
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id], 'autocomplete' => 'off']) !!}
        @else
            {!! Form::open(['method' => 'POST', 'route' => ['admin.users.store'], 'autocomplete' => 'off']) !!}
        @endisset


        <div class="row">
            <div class="col-xs-12 input-field">
                {!! Form::text('name', old('name'), ['required' => '']) !!}
                {!! Form::label('name', trans('quickadmin.users.fields.name').' *', ['class' => 'control-label']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 input-field">
                {!! Form::email('email', old('email'), ['class' => 'validate', 'placeholder' => '', 'required' => '']) !!}
                {!! Form::label('email', trans('quickadmin.users.fields.email').' *', ['data-error' => $errors->first('email')]) !!}
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 input-field">
                {!! Form::password('password', ['placeholder' => '']) !!}
                {!! Form::label('password', trans('quickadmin.users.fields.password').' *', []) !!}
                <p class="help-block"></p>
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 input-field">
                {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'select2 validate', 'required' => '']) !!}
                {!! Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['data-error' => 'wrong']) !!}
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

