<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; 

use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::latest()->get();
        return view ('posts.index' , compact('posts'));
    }

    // function create()
    function create(Request $request)
    {
        // return view('posts.create');

        $posts = Post::latest()->get();
        return view('posts.create',['posts' => '$posts']);
    }

    function store(Request $request)
    {
        //   dd($request);

        $post = new Post;
        $post -> title = $request -> title;
        $post -> contents = $request -> contents;
        // $post -> hassyu = $request -> hassyu;
        $post -> user_id = Auth::id();

        $post -> save();

        return redirect()->route('posts.index');
    }

    function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }

    function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post -> title = $request -> title;
        $post -> contents = $request -> contents;
        $post -> save();

        $posts = Post::latest()->get();

        return view('posts.index',compact('posts'));
    }

    function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
