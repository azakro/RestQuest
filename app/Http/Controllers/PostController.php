<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Mapper;

class PostController extends Controller
{
    /**
     * Show the post for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function create()
    {
    	return view('post.create');
    }


    public function show($id)
    {
        // $posts = Post::orderBy('created_at', 'asc')->get();

        // return view('posts', [
        //     'posts' => $posts
        // ]);
        $post = Post::find($id);
        $lat = $post->latitude;
        $long = $post->longitude;
        $type = $post->type;
        
        if ($type == 1) {
                Mapper::map($lat, $long)->informationWindow($lat, $long, "Current Location", ['icon' => '/icons/bench2.png', 'locate' => true]);
            } else if ($type == 2) {
                Mapper::map($lat, $long)->informationWindow($lat, $long, "Current Location", ['icon' => '/icons/water2.png', 'locate' => true]);
            } else if ($type == 3) {
                Mapper::map($lat, $long)->informationWindow($lat, $long, "Current Location", ['icon' => '/icons/toilet2.png', 'locate' => true]);
        }

        return view('post.show', ['post' => Post::findOrFail($id)]);
    }

    public function store(Request $request){
       $this->validate($request, [
           'title' => 'required|string|max:255',
       ]);

       $post = Post::create([
           'user_id' => Auth::id(),
       ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->rating = $request->rating;
        $post->latitude = $request->latitude;
        $post->longitude = $request->longitude;
        $post->type = $request->type;

        if ($request->publish) {
            $post->published_at = date('Y-m-d H:i:s');
        }

        $post->save();

        return redirect('/users/' . Auth::id());
     }

    public function edit($id){
        $post = Post::find($id);
        $lat = $post->latitude;
        $long = $post->longitude;
        Mapper::map($lat, $long, ['eventAfterLoad' => 'update(map);']);

        $type = $post->type;

        if ($type == 1) {
                Mapper::informationWindow($lat, $long, "Current Location", ['icon' => '/icons/bench2.png']);
            } else if ($type == 2) {
                Mapper::informationWindow($lat, $long, "Current Location", ['icon' => '/icons/water2.png']);
            } else if ($type == 3) {
                Mapper::informationWindow($lat, $long, "Current Location", ['icon' => '/icons/toilet2.png']);
        }

        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        echo "here";
        $post = Post::findOrFail($id);

        $this->validate($request, [
           'title' => 'required|string|max:255',
       ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->rating = $request->rating;
        $post->latitude = $request->latitude;
        $post->longitude = $request->longitude;
        $post->type = $request->type;

        if ($request->publish) {
            $post->published_at = date('Y-m-d H:i:s');
        }

        $post->save();

        return redirect('/users/' . Auth::id());
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/users/' . Auth::id());
    }

}