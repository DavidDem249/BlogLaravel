@extends('layouts.master')

@section('content')

	
	
	{{ Form::open(['route' => 'traitement']) }}

		<div class="form-group">
			{{ Form::text('username','',['placeholder' => 'Votre Username', 'class' => 'form-control']) }}

			@if($errors->first('username'))
				<div class="alert alert-danger">{{ $errors->first('username') }}</div>
			@endif

		</div>

		<div class="form-group">
			{{ Form::password('password',['class' => 'form-control']) }}

			@if($errors->first('password'))
				<div class="alert alert-danger">{{ $errors->first('password') }}</div>
			@endif

		</div>

		<div class="form-group">
			{{ Form::checkbox('remember', 'remember', false) }}
			Se souvenir de moi
		</div>

		{{ Form::submit('Se connecter',['class' => 'btn btn-primary']) }}

	{{ Form::close() }}

@stop