@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @if(empty($entity))
                Create new audit object groups
            @else
                Edit audit object groups
            @endif
        </h2>
        <form action="@if(empty($entity)){{ route('audit_object_groups.store') }}@else{{ route('audit_object_groups.update', $entity->id) }}@endif" method="POST">
            {{ csrf_field() }}
            @isset($entity)
                {{ method_field('PUT') }}
            @endisset
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            <button class="waves-effect waves-light btn" type="submit">Save</button>
        </form>
    </div>
@endsection