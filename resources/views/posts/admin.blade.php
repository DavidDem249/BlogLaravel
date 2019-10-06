@extends('../layouts.master')


@section('content')

<h2>Liste des articles</h2> &nbsp;&nbsp;<a class="btn btn-success" href="{{ route('adminCreate') }}">Ajouter un article</a><br>

	<table class="table table-stripped table-bordered">
		
		<thead>

			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th style="text-align: center">Actions</th>
			</tr>

		</thead>

		<tbody>
			
			@foreach($posts as $post)
				<tr>
					
					<th>{{ $post->id }}</th>
					<th>{{ $post->name }}</th>
					<th style="text-align: center">
						<a href="{{ route('postEdit', $post->id) }}" class="btn btn-primary">Editer</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						{{ Form::open(['route' => ['supprimer',$post->id], 'method' => 'delete']) }}
							{{ Form::submit('Supprimer',['class' => 'btn btn-danger']) }}
						{{  Form::close() }}
					</th>

				</tr>
			@endforeach

		</tbody>

	</table>

@stop