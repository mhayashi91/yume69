@extends('layouts.app')
@section('content')

<div class="big-container">
    
    <div class="middle-container-1">
        <div class="small-container-1">
            <h2>以下の記事にコメントします</h2>
            <div class="content-container">
                <div class="card-header">
                    <h5>タイトル：{{ $post->title }}</h5>
                </div>
                <div class="card-body">
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
                    <label>コメント</label>
                    <textarea class="form-control" 
                    placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="commentbutton">コメントする</button>
            </form>
        </div>
    </div>

</div>

@endsection