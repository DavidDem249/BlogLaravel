@extends('../layouts.master')

@section('content')

	<h2>{{ $post->name }} </h2>

	<p>
		Posté par : {{ $author->username }} |

		@if($post->counts_comments == 0)

			Pas de commentaire

		@elseif($post->counts_comments == 1)

			1 commentaire

		@else

			{{ $post->counts_comments }} commentaires

		@endif

	</p>

	<p> {{ $post->content }} </p>

	<h3>Les commentaires</h3>

	@if(!isset($comments))
	Pas encore de commentaire

	@else
		@foreach($comments as $comment)
			<h3>Commentaire posté par {{ $comment->user->username }}</h3>
			<p>{{ $comment->content }}</p>
		@endforeach
	@endif

	@if(Auth::check())
		<h2>Poster un commentaire</h2>

		
		{{ Form::open(['route' => ['createComment', $post->id], 'method' => 'post']) }}

			<div class="form-group">
				{{ Form::textarea('comment','',['class' => 'form-control']) }}	
			</div>

			{{ Form::submit('Envoyer',['class' => 'btn btn-primary','cols' => '8', 'rows' => '8']) }}

		{{ Form::close() }}
	@else

	Pour poster commentaire, vous devez vous connectez en cliquant  <a href="{{ route('login') }}">ici </a>


	@endif 
@stop