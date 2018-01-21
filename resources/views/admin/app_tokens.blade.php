@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="container">

        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>

    </div>
@stop

@section('javascript')
    <script>
    </script>
@endsection