@extends('../layouts.master')

@section('content')

	@if(Auth::check())
		<h1>La liste des articles du blog</h1>

			@foreach($posts as $post)
			<a href="{{ route('posts', $post->slug) }}">
				<h3>{{ $post->name }}</h3>
			</a>
			@endforeach

			<p>{{ $posts->links() }}</p>
	@else
		<p>Connecter vous pour acceder au contenus du blog</p>
	@endif



@stop