@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/show.css') }}">

        <div class="small-show">
          <h2>以下の投稿についたコメント一覧</h2>
            <div class="content-show">
                <div class="show-header">
                        <div class="image-show">
                            {{-- ここのコードあとでかえる --}}
                            <a href="{{ route('show', [$post->user->id]) }}">
                                <img src="{{ asset('storage/images/' . $post->user->avatar) }}" alt="Image" width="70px" height="70px">
                            </a>
                        </div>
                        <div class="name-boxshow">
                            <h3 class="name">{{ $post->user->name }}</h3>
                        </div>
                </div>
                <div class="card-bodyshow">
                    <h5>タイトル：{{ $post->title }}</h5>
                    <p class="card-textshow">内容：{{ $post->contents }}</p>
                    <p>投稿日時：{{ $post->created_at }}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3show">
            <div class="col-md-8show">
                <a href="{{ route('posts.index') }}" class="btn btn-primary">一覧に戻る</a>
            </div>
        </div>

        <div class="row justify-content-centershow">
            <div class="col-md-8 mt-5show">
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
            <div class="card mt-3show">
                <h5 class="card-headershow">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-bodyshow">
                    <h5 class="card-titleshow">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-textshow">内容：{{ $comment->body }}</p>
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