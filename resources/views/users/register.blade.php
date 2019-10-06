@extends('layouts.master')

@section('content')
	
	<h2>INSCRIPTION</h2><br>

	{{ Form::open(['route' => 'register']) }}

		<div class="form-group">

			{{ Form::label('username','Nom d\'Utilisateur') }}
			{{ Form::text('username','',['placeholder' => 'Votre username', 'class' => 'form-control']) }}

			@if($errors->first('username'))
				<div class="alert alert-danger">{{ $errors->first('username') }}</div>
			@endif

		</div>

		<div class="form-group">
			
			{{ Form::label('password','Mot de passe') }}

			{{ Form::password('password',['placeholder' => 'Mot de passe', 'class' => 'form-control']) }}

			@if($errors->first('password'))
				<div class="alert alert-danger">{{ $errors->first('password') }}</div>
			@endif

		</div>

		<div class="form-group">
			
			{{ Form::label('password_conf','Mot de passe confimation') }}
			{{ Form::password('password_conf',['placeholder' => 'Mot de passe confirmation', 'class' => 'form-control']) }}

			@if($errors->first('password_conf'))
				<div class="alert alert-danger">{{ $errors->first('password_conf') }}</div>
			@endif

		</div>

		{{ Form::submit('S\'inscrire',['class' => 'btn btn-primary']) }}  
		
	{{ Form::close() }}

@stop