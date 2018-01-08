@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>@lang('main.register')</h3>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="input-field{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                <label for="name">Name</label>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                <label for="email">E-Mail Address</label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" name="password" required>
                <label for="password">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
            </div>

            <div class="input-field">
                <input id="password-confirm" type="password" name="password_confirmation" required>
                <label for="password-confirm">Confirm Password</label>
            </div>

            <div class="form-group">
                <button type="submit" class="waves-effect waves-light btn blue">
                    @lang('main.register')
                </button>
            </div>
        </form>
    </div>
@endsection
