@extends('layouts.app')

@section('content')

    <div class="infoBox">

    	<h1><center><strong>{{ $post->title }}</strong></center></h1>

        @if ($post->type === 1)
             <h1><center><img src="/icons/bench.png"></center></h1>
        @elseif ($post->type === 2)
            <h1><center><img src="/icons/water.png"></center></h1>
        @else
            <h1><center><img src="/icons/toilet.png"></center></h1>
        @endif

        @if ($post->rating == 0)
             <h1><center><img src="/icons/zeroStars.png"></center></h1>
        @elseif ($post->rating == 1)
            <h1><center><img src="/icons/oneStar.png"></center></h1>
         @elseif ($post->rating == 2)
            <h1><center><img src="/icons/twoStars.png"></center></h1>
         @elseif ($post->rating == 3)
            <h1><center><img src="/icons/threeStars.png"></center></h1>
        @elseif ($post->rating == 4)
            <h1><center><img src="/icons/fourStars.png"></center></h1>
        @else
            <h1><center><img src="/icons/fiveStars.png"></center></h1>
        @endif

    	<h2><center>{{ $post->content }}</center></h2>

        <div class="btnBox">
            <div class="innerBtnBox">
        	@if (Auth::id() === $post->user_id)  
                <a href="/post/{{ $post->post_id }}/edit" id="sooEditBtn" style="text-decoration: none"> Edit </a>
                
                <form class="form-horizontal" role="form" method="POST" action="">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" id="sooDeleteBtn"> Delete </button>
                </form>
            @endif
            </div>
        </div>

    </div>

     <div class="mapDiv" style="width: 50%; height: 470px;">
                    {!! Mapper::render() !!}
    </div>

@endsection