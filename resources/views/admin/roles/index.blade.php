@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="page-title">@lang('quickadmin.roles.title')</h3>
        @can('role_create')
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a href="{{ route('admin.roles.create') }}" class="btn-floating btn-large waves-effect waves-light right pulse green"><i class="material-icons">add</i></a>
            </div>
        @endcan

        <table class="highlight bordered responsive-table {{ count($roles) > 0 ? 'datatable' : '' }} @can('role_delete') dt-select @endcan">
            <thead>
            <tr>
                @can('role_delete')
                    <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                @endcan

                <th>@lang('quickadmin.roles.fields.title')</th>
                <th>&nbsp;</th>

            </tr>
            </thead>

            <tbody>
            @if (count($roles) > 0)
                @foreach ($roles as $role)
                    <tr data-entry-id="{{ $role->id }}">
                        @can('role_delete')
                            <td></td>
                        @endcan

                        <td field-key='title'>{{ $role->title }}</td>
                        <td>
                            @can('role_view')
                                <a href="{{ route('admin.roles.show',[$role->id]) }}" class="waves-effect waves-light btn">@lang('quickadmin.qa_view')</a>
                            @endcan
                            @can('role_edit')
                                <a href="{{ route('admin.roles.edit',[$role->id]) }}" class="waves-effect waves-light btn blue">@lang('quickadmin.qa_edit')</a>
                            @endcan
                            @can('role_delete')
                                {!! Form::open(array(
                                                                        'style' => 'display: inline-block;',
                                                                        'method' => 'DELETE',
                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                        'route' => ['admin.roles.destroy', $role->id])) !!}
                                    {!! Form::button('<i class="material-icons">delete</i>', array('type' => 'submit', 'class' => 'waves-effect waves-light btn red')) !!}

                                    {!! Form::close() !!}
                            @endcan
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@stop

@section('javascript')
    <script>
        @can('role_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.roles.mass_destroy') }}';
        @endcan

    </script>
@endsection