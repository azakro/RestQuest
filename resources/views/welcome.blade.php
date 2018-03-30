@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
      
		<h1><center>Welcome<center><h1>

		<center>
			<div style="width: screen.width; height: 470px;">
					{!! Mapper::render() !!}
			</div>
		</center>            
    
    @endif
@endsection

    