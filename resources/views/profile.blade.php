<!DOCTYPE html>
<html lang="ja">
@extends('layouts.app')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>

    <body>
        <h1>マイページ</h1>
        <div class="mypage">
            <div class="post-container">
            <img src="{{ asset('storage/images/' . $user->avatar) }}"alt="" class="profile">
            <div class="profile-content">
                <div class="top-content">
                    <div class="name-occupation">
                        <h3 class="name"><span>名前：</span>{{ $user->name }}</h3>
                        <h3 class="occupation"><span>職業：</span>{{ $user->occupation }}</h3>
                    </div>
                    <a href="{{ $user->sns_link }}" class="sns-link"><i class="far fa-envelope"></i></a>
                </div>
                <div class="bottom-content">
                    <div class="introduction">
                        <h5>自己紹介</h5>
                        <p>{{ $user->introduction }}
                        </p>
                    </div>
                </div>
                
            </div>
            <div class="watch-index">
                <a href="{{ route('user.bookmarks', ['id' => $user->id]) }}" class="mybookmark">
                    <div class="mybookmark-box">
                        私の
                        <i class="fas fa-handshake"></i>
                        一覧
                    </div>
                </a>
                <a href="{{ route('myposts', ['id' => $user->id]) }}" class="mypost">
                    <div class="mypost-box">
                        {{ $user->name }}の投稿
                    </div>
                </a>
            </div>
        </div>
            <div class="bottom-button-box">
                <div class="bottom-button">
                    <button type="button" class="back"
                        onclick="window.location.href = '{{ route('posts.index') }}'">戻る</button>
                    @if ($user->id == Auth::user()->id)
                        <a href="{{ route('user.edit') }}" class="update">登録情報更新</a>
                    @endif
                </div>
            </div>
        </div>


    </body>
@endsection

</html>
