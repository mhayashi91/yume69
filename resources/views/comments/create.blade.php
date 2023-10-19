@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.js') }}"> --}}
<div class="big-container">
    
    <div class="middle-container-1">
        <h2>以下の記事にコメントします</h2>
        <div class="small-container-1">
            <div class="content-container">
                <div class="card-header">
                        <div class="image-container">
                            {{-- ここのコードあとでかえる --}}
                            <a href="{{ route('show', [$post->user->id]) }}">
                                <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="Image" width="70px" height="70px">
                            </a>
                        </div>
                        <div class="name-box">
                            <h3 class="name">{{ $post->user->name }}</h3>
                        </div>
                </div>
                <div class="card-body">
                    <h5>タイトル：{{ $post->title }}</h5>
                    <p class="card-text">内容：{{ $post->contents }}</p>
                    <p>投稿日時：{{ $post->created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="middle-container-2">
        <div class="small-container-2">
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <h3>コメント</h3>
                    <textarea class="form-control" 
                    placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <div class="post-buttons">
                    <button type="button" class="cancel" onclick="window.location='{{ route('posts.index') }}'">キャンセル</button>
                    <button type="submit" class="comment-button">コメントする</button>
                </div>
            </form>
            
        </div>
    </div>

</div>

@endsection