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
            <img src="{{ asset('storage/images/' . $user->avatar) }}"alt="" class="profile">
            <div class="profile-content">
                <div class="top-content">
                    <div class="name-occupation">
                        <h3 class="name"><span>名前：</span>{{ $post->user->name }}</h3>
                        <h3 class="occupation"><span>職業：</span>{{ $post->user->occupation }}</h3>
                    </div>
                    <a href="{{ $post->user->sns_link }}" class="sns-link"><i class="far fa-envelope"></i></a>
                </div>
                <div class="bottom-content">
                    <div class="introduction">
                        <h5>自己紹介</h5>
                        <p>{{ $post->user->introduction }}
                        </p>
                    </div>
                </div>
            </div>
            <a href="" class="mybookmark">
                <div class="mybookmark-box">
                    <i class="fas fa-handshake"></i>
                    <p>一覧を見る！</p>
                    <img src="{{ asset('storage/images/ue_mezasu_man.png') }}" alt="" class="mybookmark-image">
                </div>
            </a>


        </div>
        <div class="bottom-button">
            <button type="button" class="back" onclick="history.back()">戻る</button>
            <a href="" class="update">登録情報更新</a>
        </div>

    </body>
@endsection

</html>
