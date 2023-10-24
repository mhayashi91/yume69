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
                    {{-- <h5>タイトル：{{ $post->title }}</h5>
                    <p class="card-textshow">内容：{{ $post->contents }}</p>
                    <p>投稿日時：{{ $post->created_at }}</p> --}}
                    <table class="custom-table">
                        <tr>
                            <td>
                                <b>タイトル</b>
                            </td>
                            <td>
                                <b>{{ $post->title }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                内容
                            </td>
                            <td>
                                {{ $post->contents }}
                            </td>
                        </tr>
                        <tr>
                            <td>投稿日時</td>
                            <td>{{ $post->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8show">
                <a href="{{ route('posts.index') }}" class="btn btn-primary">一覧に戻る</a>
            </div>
        </div>

        {{-- <div class="row justify-content-centershow">
            <div class="col-md-8 mt-5show"> --}}
            {{-- <h4>コメント一覧</h4> --}}
            {{-- @foreach($post->comments as $comment)
                <div class="card mt-3">
                    <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                        <p class="card-text">内容：{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach --}}
            <div class="card-h4">
            <h4>コメント一覧</h4>
            </div>
            @foreach($post->comments as $comment)
            <div class="card mt-3show">
                    {{-- <h5 class="card-headershow">投稿者：{{ $comment->user->name }}</h5> --}}
                    <div class="custom-table2">
                        <div class="show-header">
                            <div class="image-show">
                                {{-- ここのコードあとでかえる --}}
                                {{-- <a href="{{ route('show', [$comment->user->id]) }}"> --}}
                                    <img src="{{ asset('storage/images/' . $comment->user->avatar) }}" alt="Image" width="70px" height="70px">
                                </a>
                            </div>

                            <div class="name-boxshow">
                                <h3 class="name">{{ $comment->user->name }}</h3>
                            </div>
                        </div>
                      <table class="custom-table">
                        <tr>
                            <td>
                                <b>投稿日時</b>
                            </td>
                            <td>
                                <b>{{ $comment->created_at }}</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                内容
                            </td>
                            <td>
                                {{ $comment->body }}
                            </td>
                        </tr>
                        <tr>
                      

                            {{-- <h5 class="card-titleshow">投稿日時：{{ $comment->created_at }}</h5>
                            <p class="card-textshow">内容：{{ $comment->body }}</p> --}}
                            {{-- <div class="button-danger">
                                @if(Auth::id() === $comment->user_id)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                @endif
                            </div> --}}
                        </table>
                        <div class="button-danger">
                            @if(Auth::id() === $comment->user_id)
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

            {{-- </div>
        </div> --}}

    
@endsection