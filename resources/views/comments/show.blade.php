@extends('layouts.app')
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
            コメント一覧
            @foreach($post->comments as $comment)
                <div class="card mt-3">
                    <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                        <p class="card-text">内容：{{ $comment->body }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    
@endsection