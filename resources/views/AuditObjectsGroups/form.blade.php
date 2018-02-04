@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @if(empty($entity))
                Create new category
            @else
                Edit category
            @endif
        </h2>
        <form action="@if(empty($entity)){{ route('cl_categories.store') }}@else{{ route('cl_categories.update', $entity->id) }}@endif" method="POST">
            {{ csrf_field() }}
            @isset($entity)
                {{ method_field('PUT') }}
            @endisset
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            <input class="waves-effect waves-light btn" type="submit" value="save">
        </form>
    </div>
@endsection