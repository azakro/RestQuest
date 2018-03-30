<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingPage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', function(){
	Mapper::map(40.730610, -73.935242);
	$posts = DB::table('posts')->get();
	foreach ($posts as $post) {
    	$lat = $post->latitude;
    	$lng = $post->longitude;
    	$title = $post->title;
        $type = $post->type;
    	$content = $post->content;
    	$rating = $post->rating;
        $currentid = $post->post_id;

        if ($rating == 1) {
            $rating = '<img src="/icons/oneStar.png" width="100px" height="25px">';
        } else if ($rating == 2) {
            $rating = '<img src="/icons/twoStars.png" width="100px" height="25px">';
        } else if ($rating == 3) {
            $rating = '<img src="/icons/threeStars.png" width="100px" height="25px">';
        } else if ($rating == 4) {
            $rating = '<img src="/icons/fourStars.png" width="100px" height="25px">';
        } else if ($rating == 5) {
            $rating = '<img src="/icons/fiveStars.png" width="100px" height="25px">';
        } else if ($rating == 0) {
            $rating = '<img src="/icons/zeroStars.png" width="100px" height="25px">';
        }
    	$description = "<strong>" . $title . '</strong><br>' . $rating . "<br> Description: " . $content . "<br>" . '<a href="/post/'. $currentid .'">Link to Post</a>';
    	if ($type == 1) {
    		Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/bench2.png']);
    	} else if ($type == 2) {
    		Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/water2.png']);
    	} else if ($type == 3) {
    		Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/toilet2.png']);
    	}
	}
	return view('welcome');
});

Route::get('users/{id}', function() {
    Mapper::map(40.730610, -73.935242);
    // $posts = DB::table('posts')->where('user_id', '==', Auth::id())->get();
    $posts = DB::table('posts')->get();
    foreach ($posts as $post) {
        $lat = $post->latitude;
        $lng = $post->longitude;
        $title = $post->title;
        $type = $post->type;
        $content = $post->content;
        $rating = $post->rating;
        $user = $post->user_id;
        $currentid = $post->post_id;

        if ($rating == 1) {
            $rating = '<img src="/icons/oneStar.png" width="100px" height="25px">';
        } else if ($rating == 2) {
            $rating = '<img src="/icons/twoStars.png" width="100px" height="25px">';
        } else if ($rating == 3) {
            $rating = '<img src="/icons/threeStars.png" width="100px" height="25px">';
        } else if ($rating == 4) {
            $rating = '<img src="/icons/fourStars.png" width="100px" height="25px">';
        } else if ($rating == 5) {
            $rating = '<img src="/icons/fiveStars.png" width="100px" height="25px">';
        } else if ($rating == 0) {
            $rating = '<img src="/icons/zeroStars.png" width="100px" height="25px">';
        }


        $description = "<strong>" . $title . "</strong><br>" . $rating . "<br> Description: " . $content . "<br>" . '<a href="/post/'. $currentid .'">Link to Post</a>';

        if ($user == Auth::id()) {
            if ($type == 1) {
                Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/bench2.png']);
            } else if ($type == 2) {
                Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/water2.png']);
            } else if ($type == 3) {
                Mapper::informationWindow($lat, $lng, $description, ['icon' => '/icons/toilet2.png']);
            }
        }
    }
    return view('user/show');
});

Route::get('/post/create', function () {
	Mapper::map(40.730610, -73.935242, ['eventBeforeLoad' => 'clickOn(map);']);
    return view('post/create');
});

Route::post('/post/create', 'PostController@store'); 

Route::get('/post/{post_id}', 'PostController@show');

Route::get('/post/{post_id}/edit', 'PostController@edit');
Route::post('/post/{post_id}/edit', 'PostController@update');
Route::delete('/post/{post_id}', 'PostController@destroy');



Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('', 'AdminController@index')->name('admin.dashboard');
});

