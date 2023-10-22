<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Model;

class UserController extends Controller
{
    //
    public function show($id)
    {
        $user = User::find($id);
        return view('profile', ['user' => $user]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile_edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        // バリデーションルールを設定
        $rules = [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users,email,' . Auth::user()->id],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'], // 最大ファイルサイズと許可する画像形式を追加
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'occupation' => ['nullable', 'string', 'max:15'], // 職業のバリデーションルール
            'sns_link' => ['nullable', 'url', 'max:255'], // SNSリンクのバリデーションルール
            'introduction' => ['nullable', 'string', 'max:100'],
        ];

        $this->validate($request, $rules);
        // フォームから送られたデータを取得
        $data = $request->all();
        // ユーザー情報を更新
        $user = Auth::user();
        $user->name = $data['name'];
        $user->email = $data['email'];

        // パスワードが入力された場合のみ更新
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        // 職業、SNSリンク、自己紹介を更新
        $user->occupation = $data['occupation'];
        $user->sns_link = $data['sns_link'];
        $user->introduction = $data['introduction'];

        // アバターの更新
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storeAs('public/images', $avatar);
            $user->avatar = $avatar;
        }

        $user->save();

        return redirect()->route('show', ['id' => Auth::user()->id]);
        // ->with('success', 'プロフィールが更新されました');

    }

    public function showBookmarkedPosts($userId)
    {
        $user = User::findOrFail($userId);
        $bookmarkedPosts = $user->bookmarks->pluck('post');

        return view('bookmarks.index', compact('bookmarkedPosts', 'user'));
    }
}
