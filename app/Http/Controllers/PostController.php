<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Post_tag;
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
        $post -> hassyu = $request -> hassyu;
        $post -> user_id = Auth::id();

        $post -> save();

        //DBトランザクション
        DB::transaction(function() use($post){
            $post_id = Post::insertGetId(['contents' => $post['contents'], 'user_id' => \Auth::id()]);
            dd($post);
            // $tag_exists = Tag::where('user_id', '=', \Auth::id())->where('name', '=', $post['hassyu'])
            // ->exists();

            // if( !empty($post['hassyu']) && !$tag_exists ){
            //     $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name' => $post['hassyu']]);
            //     Post_tag::insert(['post_tag' => $post_id, 'tag_id' => $tag_id]);
            // }
        });

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

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = post::where('title', 'LIKE', "%$query%")
                    ->orWhere('contents', 'LIKE', "%$query%")
                    ->get();

        return view('search', compact('posts', 'query'));
    }
}
