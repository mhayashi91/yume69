@extends('layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/create.css') }}">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">編集</div>
                 <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', ['id' => $post]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                 

                    <div class="card-body2">
                            <div class="yume-title-box">
                                <div class="yume-title">
                                    <input id="title" type="text" class="yume-title-area" value="{{ $post->title }}" name="title" required
                                        autofocus maxlength="30" placeholder="夢・目標のタイトル（20字以内）">
                                </div>
                    </div>
                    

                    <div class="yume-contents-box">
                            <div class="yume-contents">
                                <textarea id="contents" class="yume-contents-area" name="contents" {{ $post->contents }} required maxlength="140" placeholder="夢・目標の内容（100字以内）"></textarea>
                            </div>
                    </div>

                    <div class="hassyutagu-box">
                        <div class="hassyu">
                            <input id="hassyu" type="text" class="hassyu-area" name="hassyu" required
                                autofocus maxlength="30" placeholder="ハッシュタグを追加">
                        </div>
                    </div>

                    <div class="post-box">
                        <div class="post-buttons">
                            <button  type="button" class="cancel" onclick="window.location.href = '{{ route('posts.index') }}'">
                                 戻る
                            </button>
                            <button type="submit" class="post">
                                更新
                            </button>
                        </div>
                    </form>
                 </div>
              </div>
            </div>
        </div>
    </div>
@endsection