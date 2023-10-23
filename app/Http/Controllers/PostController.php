<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // public function store(Request $request)
    // {
    //     // 1. 投稿を保存
    //     $post = new Post;
    //     $post->title = $request->title;
    //     $post->contents = $request->contents;
    //     $post->user_id = Auth::id();
    //     $post->save();
    
    //     // 2. ハッシュタグを抽出
    //     $hashtags = $this->extractHashtags($request->hassyu);
    
    //     // 3. 各ハッシュタグをデータベースに保存
    //     foreach ($hashtags as $hashtag) {
    //         // タグをデータベースに保存または取得
    //         $tag = Tag::firstOrCreate(['tag_name' => $hashtag]);
    
    //         // 4. 投稿とタグの関連を設定
    //         $post->tags()->attach($tag->id);
    //     }
    
    //     return redirect()->route('posts.index');
    // }

    public function store(Request $request)
{
    // 1. 投稿を保存
    $post = new Post;
    $post->title = $request->title;
    $post->contents = $request->contents;
    $post->user_id = Auth::id();
    $post->save();

    // 2. ハッシュタグを抽出
    $hashtags = $this->extractHashtags($request->hassyu);

    // 3. 各ハッシュタグをデータベースに保存
    foreach ($hashtags as $hashtag) {
        // タグをデータベースに保存または取得
        $tag = Tag::firstOrCreate(['tag_name' => $hashtag]);

        // 4. 投稿とタグの関連を設定
        $post->tags()->attach($tag->id);
    }

    return redirect()->route('posts.index');
}

    
        public function extractHashtags($hashtag)
        {
            // 投稿内容からハッシュタグを正規表現で抽出
            preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $hashtag, $matches);
        
            // ハッシュタグを配列として返す
            return !empty($matches[1]) ? $matches[1] : [];
        }
        

        public function searchByTag($tag)
        {
            $posts = Post::whereHas('tags', function ($query) use ($tag) {
                $query->where('tag_name', $tag);
            })->get();

            return view('posts.index', compact('posts', 'tag'));
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
