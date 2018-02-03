@extends('layouts.app')

@section('title', 'audit_objects')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Audit Objects</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('audit_objects.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>

            @if($audit_objects->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Group</th>
                        <th>User</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($audit_objects as $audit_object)
                        <tr>
                            <td>{{ $audit_object->id }}</td>
                            <td>{{ $audit_object->title }}</td>
                            <td>{{ $audit_object->audit_object_groups->title }}</td>
                            <td>{{ $audit_object->users->name }}</td>
                            <td class="right">
                                <form action="{{ route('audit_objects.destroy', $audit_object->id) }}" method="POST">
                                    <a type="button" class="waves-effect waves-light btn" href="{{ route('audit_objects.edit', $audit_object->id) }}">edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No audit objects
            @endif
        </div>
    </div>
@endsection