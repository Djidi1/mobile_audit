@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @if(empty($entity))
                Create new requirement
            @else
                Edit requirement
            @endif
        </h2>
        <form action="@if(empty($entity)){{ route('requirements.store') }}@else{{ route('requirements.update', $entity->id) }}@endif" method="post">
            {{ csrf_field() }}
            @isset($entity)
                {{ method_field('PUT') }}
            @endisset
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            @include('admin.fields.select', ['field' => 'checklist_id', 'name' => 'Checklist', 'options' => $checklists])
            @include('admin.fields.select', ['field' => 'requirements_type_id', 'name' => 'Requirements type', 'options' => $requirements])
            @include('admin.fields.text', ['field' => 'warning_level', 'name' => 'Level'])
            <button class="waves-effect waves-light btn" type="submit">save</button>
        </form>
    </div>
@endsection