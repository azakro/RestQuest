@extends('layouts.app')

@section('content')

	<div class="profileBox">

		<img id="profPic" src="/icons/profPic.png" alt="profile pic">

		<div class="createPostDiv">
			<a href="{{ url('/post/create') }}" class="btn btn-primary">Create Post</a>
		</div>

		<h1><strong>{{ Auth::user()->name }}</strong>'s profile</h1>
		<h1>{{ Auth::user()->email }}</h1>
	</div>

	<center>
		<div style="width: screen.width; height: 470px;">
					{!! Mapper::render() !!}
		</div>
	</center>

@endsection
