<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述

class UsersController extends Controller
{
    //  検索用（自分以外のユーザー）
    public function search()
    {
        $users = DB::table('users')
            ->where('id', '!=', Auth::id())
            ->get();


        $follows = DB::table('follows')
            ->where('follower_id', Auth::id())
            ->get();

        return view('users.index', ['users' => $users, 'follows' => $follows]);
    }

    public function result(Request $request)
    {
        $keyword = $request->input('username');
        $users = DB::table('users')
            ->where('id', '!=', Auth::id())
            ->where('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('users.index', ['users' => $users]);
    }

    //  フォロワー一覧（自分をフォローしている人）
    public function followers()
    {
    $followers = DB::table('follows')
        ->join('users', 'follows.follower_id', '=', 'users.id')
        ->where('follows.followed_id', Auth::id())
        ->select('users')
        ->get();

    return view('users.index', ['users' => $followers]);
    }

    //  フォロー中一覧（自分がフォローしている人）
    public function followings()
    {
        $followings = DB::table('follows')
            ->join('users', 'followed_id', '=', 'users.id')
            ->where('follows.follower_id', Auth::id())
            ->select('users')
            ->get();

        return view('users.index', ['users' => $followings]);
    }

    //
    public function profile()
    {
        $users = DB::table('users')
            ->where('users.id', Auth::id())
            ->get();

        $posts = DB::table('posts')
            ->where('posts.id', Auth::id())
            ->get();


        return view('users.profile', ['users' => $users, 'posts' => $posts]);
    }

    //
    public function edit()
    {
        $user = DB::table('users')
            ->where('id', Auth::id())
            ->first();

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request){

        // 画像更新
        if($request->file('file')){
            $file_name = $request->file('file')->getClientOriginalName();
            DB::table('users')
                ->where('users.id', Auth::id())
                ->update([
                'image' => $file_name,
            ]);
            $request->file('file')->storeAs('/images', $file_name);
        };

        // dd($file_name);

        $up_user = $request->input('upName');
        $up_email = $request->input('upEmail');
        $up_password = $request->input('upPassword');
        $up_bio = $request->input('upBio');

        $request->validate([
            'upName' => ['required', 'string', 'min:4', 'max:12'],
            'upEmail' => ['required', 'string', 'email', 'max:255'],
            'upPassword' => ['nullable', 'string', 'min:8', 'max:128', 'confirmed'],
            'upBio' => ['nullable', 'string', 'max:255'],
        ], [
            'upName.min' => 'ユーザー名は4文字以上12文字以内で入力してください。',
            'upPassword.confirmed' => 'パスワードと確認の入力が一致しません。',
        ]);

        DB::table('users')
            ->where('users.id', Auth::id())
            ->update([
            'name' => $up_user,
            'email' => $up_email,
            'bio' => $up_bio,
        ]);

        if($up_password){
            DB::table('users')
                ->where('users.id', Auth::id())
                ->update([
                'password' => Hash::make($up_password)
            ]);
        };

        return redirect('/edit');
    }

    public function otherProfile($id)
    {
        $users = DB::table('users')
            ->where('users.id', $id)
            ->get();

        $posts = DB::table('posts')
            ->where('posts.id', $id)
            ->get();


        return view('users.otherProfile', ['users' => $users, 'posts' => $posts]);
    }

}
