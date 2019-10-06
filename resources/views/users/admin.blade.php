@extends('../layouts.master')

@section('content')

	<table class="table table-stripped table-bordered">
		
		<thead>
			<tr>
				<th>ID</th>
				<th>NOM</th>
				<th>STATUS</th>
				<th style="text-align: center;">ACTION</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>
						@if($user->is_admin == 1)
							Administrateur
						@else
							Membre
						@endif
					</td>

					<td width="300">
						
						{{ Form::open(['route' => ['permission', $user->id], 'method' => 'post']) }}

							@if($user->is_admin == 1)
								{{ Form::submit('Rendre membre',['class' => 'btn btn-primary']) }}
							@else
								{{ Form::submit('Rendre Admin',['class' => 'btn btn-success']) }}
							@endif

						{{ Form::close() }}

						{{ Form::open(['route' => ['userDelete',$user->id],'method' => 'delete']) }}
							{{ Form::submit('X',['class' => 'btn btn-danger']) }}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>

	</table>

@stop