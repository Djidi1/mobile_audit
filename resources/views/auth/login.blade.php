@extends('layouts.app')

@section('title')
    @lang('main.login_form')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h2>@lang('main.login_form')</h2>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    <label for="email" class="">E-Mail</label>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <label for="password" class="">Password</label>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <input id="remember_me" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember_me">@lang('main.remember_me')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="waves-effect waves-light btn">
                            @lang('main.login')
                        </button>

                        <a class="link" href="{{ route('password.request') }}">
                            @lang('main.forgot_your_password')
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
