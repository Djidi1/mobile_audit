@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Reset Password</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                <label for="email">E-Mail Address</label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="waves-effect waves-light btn blue">
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
