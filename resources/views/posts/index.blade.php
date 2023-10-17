<!DOCTYPE html>
<html lang="ja">
@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <div class="header-left">
                <!-- <h5 class="yume-text">ワード検索</h5> -->
                <form action="#" method="GET">
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

        <div class="post-box">

            < class="profile-box">
                <div class="image-container">
                    <a href="{{ route('show',[$post->user->id]) }}">
                        <img src="" alt="Image">
                    </a>
                </div>
                @foreach($posts as $post)
                {{-- {{ dd($posts); }} --}}
                <h3 class="name">{{ $post->user->name }}</h3>  
                <h3 class="occupation">{{ $post->occupation }}</h3>
                <a href="" class="sns-icon">
                    <i class="far fa-paper-plane"></i>
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
               @endforeach

            <div class="buttons">
                <a href="" class="edit-button">編集</a>
                <form action="#" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value='削除' class="delete" onclick='return confirm("本当に削除しますか？")'>
                    {{-- btn btn-danger --}}
                </form>
                <a href="#" class="comment-button">コメント</a>
                <div class="bookmark">
                    <a href="" class="bookmark-icon "><i class="fas fa-handshake"></i></a>
                    <a href="" class="bookmark-icon "><i class="far fa-handshake"></i></a>
                </div>
            </div>
            <a href="" class="comment-rink">
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

    </body>
@endsection

</html>
