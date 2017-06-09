@extends('layout')

@section('content')
	@if(Session::has('message'))
		<p class="alert">{{ Session::get('message') }}</p>
	@endif

	{{ Form::open() }}
		<div class="container">
			<form>

			<div><h2>Se connecter</h2></div>

			<label>Username</label>
			<input type="text" name="username" placeholder="username" /><br>

			<label>Password</label>
			<input type="password" name="password" placeholder="password" /><br>

			<input type="submit" value="Envoyer" />

			</form>
		</div>
	{{ Form::close() }}

	@foreach ($errors->all() as $error)
		<p class="error"> {{ $error }}</p>
	@endforeach
@stop
