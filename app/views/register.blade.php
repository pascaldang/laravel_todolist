@extends('layout')

@section('content')
	
	@foreach ($errors->all() as $error)
		<p class="error"> {{ $error }}</p>
	@endforeach

	{{ Form::open() }}
		<div class="container">
			<form>

			<div><h2>S'enregister</h2></div>

			<label for="email">Email</label>
			<input type="email" name="email" placeholder="email" /><br>

			<label>Username</label>
			<input type="text" name="username" placeholder="username" /><br>

			<label>Password</label>
			<input type="password" name="password" placeholder="password" /><br>

			<label>Password Confirmation</label>
			<input type="password" name="password_confirmation" placeholder="password_confirmation" /><br>

			<input type="submit" value="Envoyer" />

			</form>
		</div>
	{{ Form::close() }}
@stop