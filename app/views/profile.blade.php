@extends('layout')

@section('content')

	<p>On est dans le profil de {{ Auth::user()->username }}</p>

@stop