@extends('layouts.app')

@section('content')


  <head>
    {!! Mapper::renderJavascript() !!}
  </head>

	<center><h1>CREATE A POST</h1></center>
	<center>
		<div style="width: screen.width; height: 470px;">
					{!! Mapper::render() !!}
		</div>
	</center>

	<script type="text/javascript">
        var currentLat;
        var currentLng;
		function clickOn(map)
            {
                var image;
                var marker;
                var count = 0;
                var water = {
                  url: "/icons/water.png",
                  scaledSize: new google.maps.Size(32, 32)
                };
                var bench = {
                  url: "/icons/bench.png",
                  scaledSize: new google.maps.Size(32, 32)
                };
                var toilet = {
                  url: "/icons/toilet.png",
                  scaledSize: new google.maps.Size(32, 32)
                };

                // if (document.getElementById('benchRadio').checked == true) {
                //   console.log("bench checked");
                //   image = bench;

                // } else if (document.getElementById('bubblerRadio').checked == true) {
                //   console.log("bubbler checked");
                //   image = water;

                // } else if (document.getElementById('bathroomRadio').checked == true) {
                //   console.log("bathroom checked");
                //   image = toilet;

                // }

                google.maps.event.addListener(map, 'click', function (e) {

                    if (count == 0) {
                      marker = new google.maps.Marker({
                        position: e.latLng,
                        map: map,
                        icon: image
                      });
                    } else {
                      marker.setMap(null);
                      marker = new google.maps.Marker({
                        position: e.latLng,
                        map: map,
                        icon: image
                      });
                    }
                    count = 1;
                    map.panTo(e.latLng);
                    currentLat = e.latLng.lat();
                    currentLng = e.latLng.lng();
                    // console.log(currentLat);
                    // console.log(currentLng);

                    var lat = currentLat;
                    var lng = currentLng;
                    document.getElementById('latfield').value = parseFloat(lat);
                    document.getElementById('lngfield').value = parseFloat(lng);
                });
            }

      // window.onload = function() {
      //   var lat = currentLat;
      //   var lng = currentLng;
      //   document.getElementById('latfield').value =lat;
      // }
     </script>

     <div id = 'postContainer'>
	    <form id="postForm" role="form" method="POST" action="">
        {{ csrf_field() }}

        <div id = "selectionContainer">
          <center><strong><p style="font-size: 200%">Type</p></strong></center>
          <label for="benchRadio"><input type="radio" id="benchRadio" name="type" value="1" required autofocus>Bench</label>
          <label for="bubblerRadio"><input type="radio" id="bubblerRadio" name="type" value="2" required autofocus>Bubbler </label>
          <label for="bathroomRadio"><input type="radio" id="bathroomRadio" name="type" value="3" required autofocus>Bathroom </label>
        </div>

        <div class="titleWrapper">
          <center><strong><p style="font-size: 200%">Title</p></strong></center>
          <input id="title" type="text" name="title" value="{{ old('title') ?: '' }}" required autofocus>
          @if ($errors->has('title'))
              <span class="help-block">
                  <strong>{{ $errors->first('title') }}</strong>
              </span>
          @endif
        </div>
        

        <div class="rating-wrapper">
            <center><strong><p style="font-size: 200%">Rating</p></strong></center>
            <input type="radio" class="rating-input" id="rating-input-1-5" name="rating" value="5"/>
            <label for="rating-input-1-5" class="rating-star"></label>
            <input type="radio" class="rating-input" id="rating-input-1-4" name="rating" value="4"/>
            <label for="rating-input-1-4" class="rating-star"></label>
            <input type="radio" class="rating-input" id="rating-input-1-3" name="rating" value="3"/>
            <label for="rating-input-1-3" class="rating-star"></label>
            <input type="radio" class="rating-input" id="rating-input-1-2" name="rating" value="2"/>
            <label for="rating-input-1-2" class="rating-star"></label>
            <input type="radio" class="rating-input" id="rating-input-1-1" name="rating" value="1"/>
            <label for="rating-input-1-1" class="rating-star"></label>
        </div>

        <input id="latfield" type="hidden" name="latitude" value=lat>

        <input id="lngfield" type="hidden" name="longitude" value=lng>

        <input id="user_id" type="hidden" name="user_id" value="{{ Auth::id() }}">

        <div class="experienceWrapper">
          <center><strong><p style="font-size: 200%">Description</p></strong></center>
          <textarea id="content" name="content" value="{{ old('content') ?: '' }}"></textarea>
          @if ($errors->has('content'))
              <span class="help-block">
                  <strong>{{ $errors->first('content') }}</strong>
              </span>
          @endif
        </div>

        

        <button type="submit" class="btn btn-primary">Post</button>

    </form>
  </div>

@endsection
