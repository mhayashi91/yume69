<!DOCTYPE html>
<html lang="ja">
@extends('layouts.app')
@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/serch_index.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>

    <body>
        <h1 style="text-align: center;">#検索結果</h1>
        @if ($posts->isEmpty())
            <p class="not-exist">該当する投稿はありません。</p>
            <div class="back-box">
                <button type="button" class="back" onclick="history.back()">戻る</button>
              </div>
        @else
        <div class="big-container">
            @foreach ($posts as $post)
                <div class="post-box">

                    <div class="profile-box">
                        <div class="image-container">
                            <a href="{{ route('show', [$post->user->id]) }}">
                                <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="Image">
                            </a>
                        </div>
                        <a href="{{ route('show', [$post->user->id]) }}" class="name-link">
                        <h3 class="name">{{ $post->user->name }}</h3>
                        </a>
                        <h3 class="occupation">{{ $post->user->occupation }}</h3>
                        <a href="{{ $post->user->sns_link }}" class="sns-icon">
                            @if (strpos($post->user->sns_link, 'youtube') !== false)
                                <i class="fab fa-youtube" style="color: red;"></i>
                            @elseif (strpos($post->user->sns_link, 'facebook') !== false)
                                <i class="fab fa-facebook" style="color: blue"></i>
                            @elseif (strpos($post->user->sns_link, 'instagram') !== false)
                                <i class="fab fa-instagram" style="color: rgb(251, 82, 214);"></i>
                            @elseif (strpos($post->user->sns_link, 'line') !== false)
                                <i class="fab fa-line" style="color: green;"></i>
                            @elseif (strpos($post->user->sns_link, 'twitter') !== false)
                                <i class="fab fa-twitter" style="color: rgb(56, 203, 233);"></i>
                            @else
                                <i class="fas fa-link" style="color: orange;"></i>
                            @endif
                        </a>
                    </div>

                    <div class="post-content-cover">
                        <div class="post-content">
                            <h2 class="title">{{ $post->title }}</h2>
                            <p class="contents">{{ $post->contents }}</p>
                        </div>
                        <div class="tags">
                            <p class="tags_cnotent">{{ $post->tags_cnotent }}</p>
                        </div>
                    </div>
                    <div class="buttons">
                        @if($post->user_id == Auth::user()->id)
                        <a href="{{ route('posts.edit', $post->id) }}" class="edit-button">編集</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value='削除' class="delete" onclick='return confirm("本当に削除しますか？")'>
                            
                        </form>
                        @endif    


                        {{-- <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="comment-button">コメント</a> --}}
                        @if($post->user->id !== Auth::user()->id)
                        <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="comment-button">コメント</a>
                        @endif

                            

                        <div class="bookmark">
                            @if($post->likedBy(Auth::user())->count() > 0)
                            <a href="/bookmarks/{{ $post->likedBy(Auth::user())
                                ->firstOrfail()->id }}" class="bookmark-icon "><i class="fas fa-handshake"></i></a>
                            @else
                            <a href="/posts/{{ $post->id }}/bookmarks" class="bookmark-icon "><i class="far fa-handshake"></i></a>
                            @endif
                            {{ $post->bookmarks->count() }}
                            
                        </div>
                    </div>
                    <a href="{{ route('comments.showPostComments', $post) }}" class="comment-rink">
                        <h5 cass="comment-watch">コメントを見る！</h5>
                    </a>
                    
                </div>
            @endforeach
        @endif
        </div>
    </body>
@endsection

</html>
