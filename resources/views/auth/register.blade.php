@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- 名前 --}}
                        <div class="register-row-mb-3">
                            <label for="name" class="col-md-4 register-col-form-label text-md-end">{{ __('名前 *') }}</label>

                            <div class="register-col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="夢　太郎　(15字以内)" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- メアド --}}
                        <div class="register-row-mb-3">
                            <label for="email" class="col-md-4 register-col-form-label text-md-end">{{ __('メールアドレス *') }}</label>

                            <div class="register-col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- プロ画 --}}
                        <div class="register-row-mb-3">
                            <label for="avatar" class="col-md-4 register-col-form-label text-md-end">{{ __('プロフィール画像（サイズは1024kbyteまで) *') }}</label>

                            <div class="register-col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード --}}
                        <div class="register-row-mb-3">
                            <label for="password" class="col-md-4 register-col-form-label text-md-end">{{ __('パスワード *') }}</label>

                            <div class="register-col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- パスワード確認 --}}
                        <div class="register-row-mb-3">
                            <label for="password-confirm" class="col-md-4 register-col-form-label text-md-end">{{ __('パスワード確認 *') }}</label>

                            <div class="register-col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- 職業 --}}
                        <div class="register-row-mb-3">
                            <label for="occupation" class="col-md-4 register-col-form-label text-md-end">{{ __('職業') }}</label>

                            <div class="register-col-md-6">
                                <input id="occupation" type="text" class="form-control" name="occupation" placeholder="例：看護師、学生、無職、サラリーマンなど　(15字以内)" autofocus>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- SNSリンク --}}
                         <div class="register-row-mb-3">
                            <label for="sns_link" class="col-md-4 register-col-form-label text-md-end">{{ __('SNSリンク') }}</label>

                            <div class="register-col-md-6">
                                <input id="sns_link" type="text" class="form-control" name="sns_link" placeholder="例：Instagram、Facebook、LINEなど" autofocus>
                                @error('sns_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- 自己紹介 --}}
                         <div class="register-row-mb-3">
                            <label for="introduction" class="col-md-4 register-col-form-label text-md-end">{{ __('自己紹介') }}</label>

                            <div class="register-col-md-6">
                                <textarea id="introduction" class="form-control" name="introduction" rows="4" autofocus placeholder="はじめまして！私は現在....(100字以内)"></textarea>
                                @error('introduction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- 投稿ボタン --}}
                        <div class="register-row-mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
