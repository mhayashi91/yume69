<!DOCTYPE html>
<html lang="ja">
@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <script src="{{ asset('css/app.js') }}"></script>
    </head>

    <body>
        <header>
            <div class="header-left">
                <!-- <h5 class="yume-text">ワード検索</h5> -->
                <form action="{{ route('posts.search') }}" method="GET">
                    <input type="text" name="query" placeholder="検索キーワード" class="search-bar">
                    <button type="submit" class="search-button">検索</button>
                </form>
            </div>
            <div class="header-right">
                <button class="create-button">
                    <a href="{{ route('posts.create') }}">新規投稿</a>
                </button>
            </div>
        </header>
        <div class="big-container">
            @foreach ($posts as $post)
                <div class="post-box">

                    <div class="profile-box">
                        <div class="image-container">
                            <a href="{{ route('show', [$post->user->id]) }}">
                                <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="Image">
                            </a>
                        </div>
                        {{-- @foreach ($posts as $post) --}}
                        {{-- {{ dd($posts); }} --}}
                        <h3 class="name">{{ $post->user->name }}</h3>
                        <h3 class="occupation">{{ $post->user->occupation }}</h3>
                        <a href="{{ $post->user->sns_link }}" class="sns-icon">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>

                    <div class="post-content-cover">
                        <div class="post-content">
                            <h2 class="title">{{ $post->title }}</h2>
                            <p class="contents">{{ $post->contents }}</p>
                        </div>
                        {{-- <div class="tags">
                            @foreach ($post->tags as $tag)
                                <p class="tags_content">#{{ $tag->tag_name }}</p>
                            @endforeach
                        </div> --}}
                        {{-- <div class="tags">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.search', ['tag' => $tag->tag_name]) }}" class="tags_content">#{{ $tag->tag_name }}</a>
                            @endforeach
                        </div> --}}
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tags.search', ['tag' => $tag->tag_name]) }}">#{{ $tag->tag_name }}</a>
                        @endforeach

                        
                        
                    </div>
                    {{-- @endforeach --}}
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
                    {{-- <a href="" class="comment-rink">
                        <h5 class="comment-watch">コメントを見る！</h5>
                    </a> --}}
                    <a href="{{ route('comments.showPostComments', $post) }}" class="comment-rink">
                        <h5 class="comment-watch">コメントを見る！</h5>
                    </a>
                    
                    {{-- <div class="comment-box">
                         <h6 class="comment-name">投稿者：仮</h6>
                         <div class="comment-body">
                         <h6 class="comment-date">投稿日時：仮</h6>
                         <p class="comment-text">内容：仮</p>
                         </div>
                         </div> --}}
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </body>
@endsection

</html>
