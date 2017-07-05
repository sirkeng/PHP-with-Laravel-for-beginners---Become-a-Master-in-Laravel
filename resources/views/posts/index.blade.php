@extends('layouts.app')


@section('content')

	<ul>

	@foreach($posts as $post)

		<div class="inage-container">
			<img height="100" src="{{$post->path}}" alt="">
		</div>


		<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>

	@endforeach

	</ul>


@endsection