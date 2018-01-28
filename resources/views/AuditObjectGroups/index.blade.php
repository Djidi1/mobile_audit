@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>audit objects groups</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('audit_object_groups.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>
            @if($audit_object_groups->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Count</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($audit_object_groups as $audit_object_group)
                        <tr>
                            <td>{{ $audit_object_group->id }}</td>
                            <td>{{ $audit_object_group->title }}</td>
                            <td>{{ $audit_object_group->audit_objects->count() }}</td>
                            <td class="right">
                                <form action="{{ route('audit_object_groups.destroy', $audit_object_group->id) }}" method="POST">
                                    <a type="button" class="waves-effect waves-light btn" href="{{ route('audit_object_groups.edit', $audit_object_group->id) }}">edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No audit object groups
            @endif
        </div>
    </div>
@endsection