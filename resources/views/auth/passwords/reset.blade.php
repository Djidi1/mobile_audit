@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Reset Password</h3>

        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
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

            <div class="input-field{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input id="password-confirm" type="password" name="password_confirmation" required>
                <label for="password-confirm">Confirm Password</label>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="waves-effect waves-light btn blue">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
