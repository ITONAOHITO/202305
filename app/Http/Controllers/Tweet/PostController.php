<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add() {
        return view('tweet.post');
    }

    public function post(Request $request) {

        $this->validate($request, Post::$rules);

        $tweet = $request->all();
        $post = new Post;
        $post->fill($tweet);
        $post->save();

        unset($tweet['_token']);

        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('tweet.post', ['posts' => $posts]);
    }

    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('tweet.post', ['posts' => $posts]);
    }   

    public function destroy(Request $request) {
        $delete_tweet = Post::find($request->query('id'));
        
        $delete_tweet->delete();
        
        return redirect('tweet/post');
    }

}
