@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @if(empty($entity))
                Create new audit object
            @else
                Edit audit object
            @endif
        </h2>
        <form action="@if(empty($entity)){{ route('audit_objects.store') }}@else{{ route('audit_objects.update', $entity->id) }}@endif" method="post">
            {{ csrf_field() }}
            @isset($entity)
                {{ method_field('PUT') }}
            @endisset
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            @include('admin.fields.select', ['field' => 'user_id', 'name' => 'User', 'options' => $users])
            @include('admin.fields.select', ['field' => 'audit_object_group_id', 'name' => 'Group', 'options' => $audit_object_groups])
            <button class="waves-effect waves-light btn" type="submit">save</button>
        </form>
    </div>
@endsection