<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //一覧表示
    public function index()
    {
        // $posts = Post::latest()->get();
        $posts = Post::latest()->paginate(6);
        return view ('posts.index' , compact('posts'));
    }
    
    //新規作成
    function create(Request $request)
    {
        // return view('posts.create');
        $posts = Post::latest()->get();
        return view('posts.create',['posts' => '$posts']);
    }

    public function store(Request $request)
    {
        // 2. ハッシュタグを抽出
        $hashtags = $this->extractHashtags($request->hassyu);

        // 3. もしハッシュタグの数が3つ未満の場合に保存
        if (count($hashtags) <= 3) {
            // 1. 投稿を保存
            $post = new Post;
            $post->title = $request->title;
            $post->contents = $request->contents;
            $post->user_id = Auth::id();
            $post->save();

            // 各ハッシュタグをデータベースに保存
            foreach ($hashtags as $hashtag) {
                // タグをデータベースに保存または取得
                $tag = Tag::firstOrCreate(['tag_name' => $hashtag]);

                // 投稿とタグの関連を設定
                $post->tags()->attach($tag->id);
            }

            return redirect()->route('posts.index');
        } else {
            // ハッシュタグが4つ以上の場合はリダイレクト
            return redirect()->route('posts.create')->with('error', 'ハッシュタグは3つまでです。');
        }
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
        })->paginate(6); 

        return view('posts.tagsearch', compact('posts', 'tag'));
    }



    //編集
    function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit',['post'=>$post]);
    }

    //更新
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->contents = $request->contents;
        $post->save();

        // 既存のタグをデタッチ
        $post->tags()->detach();

        // 新しいタグ情報を抽出して保存
        $hashtags = $this->extractHashtags($request->hassyu);
        foreach ($hashtags as $hashtag) {
            $tag = Tag::firstOrCreate(['tag_name' => $hashtag]);
            $post->tags()->attach($tag->id);
        }

        // 他の処理...

        return redirect()->route('posts.index');
    }


    //削除
    function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    //簡単検索
    public function search(Request $request)
    {
        $query = $request->input('query');

        // ページネーションを有効にして検索結果を取得
        $posts = Post::where('title', 'LIKE', "%$query%")
                    ->orWhere('contents', 'LIKE', "%$query%")
                    ->paginate(6); // 1ページに表示する投稿数を設定

        return view('search', compact('posts', 'query'));
    }

}
