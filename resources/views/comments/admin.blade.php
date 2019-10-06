@extends('../layouts.master')

@section('content')
	
	<table class="table table-stripped table-bordered">
		
		<thead>
			<tr>
				<th>Commentaires</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($comments as $comment)
				<tr>
					<td>{{ $comment->content }}</td>
					<td>
						{{ Form::open(['route' => ['commentDelete', $comment->id], 'method' => 'delete']) }}

							{{ Form::submit('X',['class' => 'btn btn-danger']) }}

						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

@stop