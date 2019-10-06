@extends('../layouts/master')


@section('content')

<h2>Création d'un nouveau article</h2>

{{ Form::open(['route' => ['saving'], 'method' => 'POST']) }}

	<div class="form-group">
		
		{{ Form::label('name','Nom :') }}
		{{ Form::text('name','',['class' => 'form-control']) }}

		
		@if($errors->first('name'))
			<p style="color:#CD3F3F;">{{ $errors->first('name') }}</p>
		@endif

	</div>

	<div class="form-group">
		
		{{ Form::label('content','Contenu :') }}
		{{ Form::textarea('content','',['class' => 'form-control']) }}

		@if($errors->first('content'))
			<p style="color:#CD3F3F;">{{ $errors->first('content') }}</p>
		@endif
		
	</div>

	{{ Form::submit('Modifier',['class' => 'btn btn-primary'])}}

{{ Form::close() }}

@stop