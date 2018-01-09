@extends('layouts.app')

@section('title', 'Requirements')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Requirements</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('requirements.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>

            @if($requirements->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Checklist</th>
                        <th>Level</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($requirements as $requirement)
                        <tr>
                            <td>{{ $requirement->id }}</td>
                            <td>{{ $requirement->title }}</td>
                            <td>{{ $requirement->checklist->title }}</td>
                            <td>{{ $requirement->warning_level }}</td>
                            <td class="right">
                                <form action="{{ route('requirements.destroy', $requirement->id) }}" method="POST">
                                    <a type="button" class="waves-effect waves-light btn" href="{{ route('requirements.edit', $requirement->id) }}">edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No requirements
            @endif
        </div>
    </div>
@endsection