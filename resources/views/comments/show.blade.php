@extends('layouts.app')
@section('content')

        <h2>以下の投稿についたコメント一覧</h2>
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

        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <a href="{{ route('posts.index') }}" class="btn btn-primary">一覧に戻る</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
            コメント一覧
            {{-- @foreach($post->comments as $comment)
                <div class="card mt-3">
                    <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                        <p class="card-text">内容：{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach --}}
            @foreach($post->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-text">内容：{{ $comment->body }}</p>
                    @if(Auth::id() === $comment->user_id)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    @endif
                </div>
            </div>
@endforeach

            </div>
        </div>

    
@endsection