@extends('layout')

@section('content')
	<h1>Ma ToDoList</h1>
	<h2><a href="/index.php/add">Nouvelle tâche</a></h2>
	<ul>
		@foreach($tasks as $task)
				{{ Form::open() }}
					<input type="checkbox"  onClick="this.form.submit()"  {{ $task->done ? 'checked' : ''}} />
					<input type="hidden" name="id" value="{{ $task->id }}">
					{{ $task->name}} <small><a href="/index.php/delete/{{ $task->id }}">(X)</a></small>
				{{ Form::close() }}
		@endforeach
	</ul>
@stop
