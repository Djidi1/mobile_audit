@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Categories</h3>
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{route('cl_categories.create')}}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>
            @if($cl_categories->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Count</th>
                        <th class="right-align">Actions</th>
                    </tr>
                    @foreach($cl_categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->checklists->count() }}</td>
                            <td class="right">
                                <form action="{{ route('cl_categories.destroy', $category->id) }}" method="POST">
                                    <a type="button" class="waves-effect waves-light btn" href="{{ route('cl_categories.edit', $category->id) }}">edit</a>
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                No categories
            @endif
        </div>
    </div>
@endsection