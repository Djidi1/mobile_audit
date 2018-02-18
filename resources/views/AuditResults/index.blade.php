@extends('layouts.app')

@section('title', 'audit')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Audit Results</h3>

            @if($audit_results->count() > 0)
                <table class="highlight bordered responsive-table">
                    <tr>
                        <th>ID</th>
                        <th>Audit</th>
                        <th>Requirement</th>
                        <th>Result</th>
                    </tr>
                    @foreach($audit_results as $audit_result)
                        <tr>
                            <td>{{ $audit_result->id }}</td>
                            <td>{{ $audit_result->audit->title }}</td>
                            <td>{{ $audit_result->requirement->title }}</td>
                            <td title="{{ $audit_result->comment }}">{{ $audit_result->result }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                No results
            @endif
        </div>
    </div>
@endsection