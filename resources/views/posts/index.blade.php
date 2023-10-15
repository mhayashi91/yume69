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
                    <a href="#">新規投稿</a>
                </button>
            </div>
        </header>

        <div class="post-box">

            <div class="profile-box">
                <div class="image-container">
                    <a href="#">
                        {{-- 仮画像エネル --}}
                        <img src="{{ asset('storage/images/onepiece14_enel.png') }}" alt="Image">
                    </a>
                </div>
                <h3 class="name">仮名前</h3>
                <h3 class="occupation">仮職業</h3>
                <a href="" class="sns-icon">
                    <i class="far fa-paper-plane"></i>
                </a>
            </div>

            <div class="post-content-cover">
                <div class="post-content">
                    <h2 class="title">仮タイトル</h2>
                    <p class="contents">仮内容</p>
                </div>
                <div class="tags">
                    <p class="tags_cnotent">仮タグ</p>
                </div>
            </div>

            <div class="buttons">
                <a href="#" class="edit-button">編集</a>
                <form action="" method="post">
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

            <h3 class="comment-index">コメント一覧</h3>
            <div class="comment-box">
                <h6 class="comment-name">投稿者：仮</h6>
                <div class="comment-body">
                    <h6 class="comment-date">投稿日時：仮</h6>
                    <p class="comment-text">内容：仮</p>
                </div>
            </div>
        </div>

    </body>
@endsection

</html>
