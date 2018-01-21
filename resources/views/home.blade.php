@extends('layouts.app')

@section('title')
    @lang('main.title')
@endsection

@section('content')
<div class="container">
    <div class="content">
{{--        <h1>@yield('title')</h1>--}}
        <div class="title m-b-md">
            Добро пожаловать!<br>
            Welcome!
        </div>

        <div class="links">
            @yield('content')
        </div>
    </div>
</div>
@endsection
