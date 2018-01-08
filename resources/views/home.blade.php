@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content">
        <h1>@yield('title')</h1>
        <div class="title m-b-md">
            Welcome!
        </div>

        <div class="links">
            @yield('content')
        </div>
    </div>
</div>
@endsection
