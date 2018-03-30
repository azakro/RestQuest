@extends('layouts.landing')

@section('content')
      <img id="bench" src="/icons/bench.png">
      <img id="toilet" src="/icons/toilet.png">
      <img id="water" src="/icons/water.png">

      <canvas id="myCanvas" resize='true'></canvas>
      <div id="buttonContainer">
        <a href="{{ url('/welcome') }}">
          <div class="ui animated button" tabindex="0">
          <div class="visible content">Enter</div>
            <div class="hidden content">
              <i class="right arrow icon"></i>
            </div>
          </div>
        </a>
      </div>
@endsection
