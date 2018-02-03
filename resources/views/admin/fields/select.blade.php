@extends('admin.fields.main')

@section('field')
	<select name="{{ $field }}" class="">
		@foreach($options as $option)
			<option value="{{ $option->id }}" @if((isset($entity) && $entity->$field == $option->id) || old($field) == $option->id) selected @endif>@if (isset($option->title)) {{ $option->title }} @else {{ $option->name }} @endif</option>
		@endforeach
	</select>
@overwrite
