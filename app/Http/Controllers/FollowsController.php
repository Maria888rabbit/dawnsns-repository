<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //追記
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{

    //フォローボタン押下→データ追加
    public function follow(Request $request)
    {
        $user_id = $request->input('user_id');
        $exists = DB::table('follows')
            ->where('follower_id', Auth::id())
            ->where('user_id', $user_id)
            ->exists();

        if (!$exists) {
            DB::table('follows')->insert([
                'follower_id' => Auth::id(),   // フォローする側（自分）
                'user_id' => $user_id,  // フォローされる側（相手）
                'created_at' => now(),
            ]);
        }

        return redirect('/search');
    }

    // フォロー解除
    public function delete(Request $request)
    {
        $user_id = $request->input('user_id');
            DB::table('follows')
                ->where('follower_id', Auth::id())
                ->where('user_id', $user_id)
                ->delete();

        return redirect('/search');
    }

    //フォローリスト
    public function list()
    {
        $follower_id = Auth::id(); // ログイン中のユーザー

        $users = DB::table('follows')
                ->join('users', 'follows.user_id', '=', 'users.id')
                ->where('follows.follower_id', $follower_id)
                ->select('users.id', 'users.name', 'users.profile_image') // 必要なカラム
                ->get();

        return view('follows.list', compact('users'));
    }

    //フォローリスト
    public function followList()
    {
        $users = DB::table('users')
            ->LeftJoin('follows', 'users.id', '=', 'follows.user_id')
            ->where('users.id', '!=', Auth::id())
            ->where('follower_id', '=', Auth::id())
            ->get();

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->get();

        return view('follows.followList',  ['users' => $users, 'posts' => $posts]);
    }

    public function followerList()
    {
        $users = DB::table('users')
            ->LeftJoin('follows', 'users.id', '=', 'follows.user_id')
            ->where('users.id', '!=', Auth::id())
            ->where('user_id', '=', Auth::id())
            ->get();

        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->get();

        return view('follows.followerList',  ['users' => $users, 'posts' => $posts]);
    }
}
