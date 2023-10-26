@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/show.css') }}">

    <div class="big-container">
        <div class="content-container">
            <div class="image-name">
                <div class="image-container">
                    <a href="{{ route('show', [$post->user->id]) }}">
                        <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="Image" width="70px"
                            height="70px">
                    </a>
                </div>
                <div class="name-box">
                    <h3 class="name">{{ $post->user->name }}</h3>
                </div>
            </div>
            <div class="post-content-box">
                <div class="post-contents">
                    <div class="title">
                        <h6>タイトル：{{ $post->title }}</h6>
                    </div>
                    <p class="card-text">内容：{{ $post->contents }}</p>
                </div>
                <p>投稿日時：{{ $post->created_at }}</p>
            </div>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">一覧に戻る</a>
        </div>
    </div>


    <div class="comment-index-box">
        <div class="comment-index">
            <h6>↓ コメント一覧 ↓</h6>
        </div>
    </div>

    @foreach ($post->comments as $comment)
        <div class="comments-box-container">
            <div class="comments-box">
                <div class="show-header">
                    <div class="image-container">
                        <img src="{{ asset('storage/images/' . $comment->user->avatar) }}" alt="Image" width="70px"
                            height="70px">
                        </a>
                    </div>
                    <div class="name-boxshow">
                        <h3 class="name">{{ $comment->user->name }}</h3>
                    </div>
                </div>
                <div class="table-comments">
                    <div class="comment">
                        <div class="comment-info">
                            <p class="date">投稿日時：</p>
                            <p>{{ $comment->created_at }}</p>
                        </div>
                        <div class="comment-content">
                            <p class="naiyou">内容：</p>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                </div>
                <div class="button-danger">
                    @if (Auth::id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
