<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Post::whereIn('user_id', [1,8])->get();
        $posts = Post::with('user')->take(10)->get(); 
        return response()->json(compact('posts'));
    }

}
