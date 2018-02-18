@extends('layouts.app')

@section('title', 'audit')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Audit Lists</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('audit_objects.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>

            @if($audits->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Checklist</th>
                        <th>Object</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Result</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($audits as $audit)
                        <tr>
                            <td>{{ $audit->id }}</td>
                            <td>{{ $audit->title }}</td>
                            <td>{{ $audit->checklist->title }}</td>
                            <td>{{ $audit->audit_object->title }}</td>
                            <td>{{ $audit->user->name }}</td>
                            <td>{{ $audit->date_add }}</td>
                            <td>{{ $audit->audit_result->count() }}</td>
                            <td class="right">
                                @if ($audit->audit_result->count() > 0)
                                    <a type="button" class="waves-effect waves-light btn blue" href="{{ route('audit_results.index', $audit->id) }}">results</a>
                                @else
                                    <form action="{{ route('audit_objects.destroy', $audit->id) }}" method="POST">
                                        <a type="button" class="waves-effect waves-light btn" href="{{ route('audit_objects.edit', $audit->id) }}">edit</a>
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No audits
            @endif
        </div>
    </div>
@endsection