@extends('layout')

@section('content')
	<h1>Créer une nouvelle tâche</h1>

	{{ Form::open() }}
		<input type="text" name="name" placeholder="Nom de la nouvelle tâche">
		<input type="submit" value="Ajouter">
	{{ Form::close() }}

	@foreach ($errors->all() as $error)
		<p class="error"> {{ $error }}</p>
	@endforeach
@stop