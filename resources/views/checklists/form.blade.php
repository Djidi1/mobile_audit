@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>
            @if(empty($entity))
                Create new checklist
            @else
                Edit checklist
            @endif
        </h2>
        <form action="@if(empty($entity)){{ route('checklists.store') }}@else{{ route('checklists.update', $entity->id) }}@endif" method="post">
            {{ csrf_field() }}
            @isset($entity)
                {{ method_field('PUT') }}
            @endisset
            @include('admin.fields.text', ['field' => 'title', 'name' => 'Title'])
            @include('admin.fields.select', ['field' => 'cl_category_id', 'name' => 'Category', 'options' => $cl_categories])
            <button class="waves-effect waves-light btn" type="submit">save</button>
        </form>
    </div>
@endsection