@extends('layouts.app')

@section('title', 'checklists')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Checklists</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('checklists.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>

            @if($checklists->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Requrements</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($checklists as $checklist)
                        <tr>
                            <td>{{ $checklist->id }}</td>
                            <td>{{ $checklist->title }}</td>
                            <td>{{ $checklist->cl_category->title }}</td>
                            <td>{{ $checklist->requirement->count() }}</td>
                            <td class="right">
                                <form action="{{ route('checklists.destroy', $checklist->id) }}" method="POST">
                                    <a type="button" class="waves-effect waves-light btn" href="{{ route('checklists.edit', $checklist->id) }}">edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No checklists
            @endif
        </div>
    </div>
@endsection