<!DOCTYPE html>
<html lang="ja">
  @extends('layouts.app')

  @section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
  <header>
    <div class="header-left">
      <!-- <h5 class="yume-text">ワード検索</h5> -->
      <form action="#" method="GET">
        <input type="text" name="query" placeholder="検索キーワード" class="search-bar">
        <button type="submit" class="search-button">検索</button>
      </form>
    </div>
    <div class="header-right">
      <button class="create-button">
        <a href="#">新規投稿</a>
      </button>
    </div>
  </header>

  <div class="post-box">

    <div class="profile-box">
      <div class="image-container">
        <a href="#">
          <img src="" alt="Image">
        </a>
      </div>
      <h2 class="name">仮名前</h2>
      <h3 class="occupation">仮職業</h3>
      <a href="">
        <img src="{{ asset('storage/images/contact.png') }}" alt="" class="contact-button">
      </a>
    </div>

    <div class="post-content-cover">
      <div class="post-content">
        <h2 class="title">仮タイトル</h2>
        <p class="contents">仮内容</p>
      </div>
      <div class="tags">

      </div>
    </div>

    <div class="buttons">
      <a href="#" class="edit-button">編集</a>
      <form action="" method="post">
        @csrf
        @method('delete')
        <input type="submit" value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？")'>
      </form>
      <div class="bookmark">
        <a href="#">
          <img src="{{ asset('storage/images/katarouze.png') }}" alt="" class="katarouze">
        </a>
      </div>
      <a href="#" class="comment-button">コメント</a>
    </div>

    <h3 class="comment-index">コメント一覧</h3>
    <div class="comment-box">
      <h6 class="comment-name">投稿者：仮</h6>
      <div class="comment-body">
        <h6 class="comment-date">投稿日時：仮</h6>
        <p class="comment-text">内容：仮</p>
      </div>
    </div>
  </div>

  <footer>
    Copyright &copy; yume69 Inc.
  </footer>

</body>
@endsection
</html>
