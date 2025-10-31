<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function hello()
    {
        echo 'Hello World!!<br>';
        echo 'コントローラーから';
    }

    // indexメソッドを以下に追加
    public function index()
    {
        $posts = DB::table('posts')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function test()
    {
        $posts = DB::table('posts')->where('user_id', Auth::id())->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(Request $request)
    {
        $post = $request->input('newPost');

        DB::table('posts')->insert([
            'user_id' => Auth::id(),
            'post' => $post,
            'created_at' => now(),
        ]);

        return redirect('/index');
    }





    public function updateForm($id){
        $post = DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.updateForm', ['post' => $post]);
    }



    public function update(Request $request){
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/index');
    }

    public function delete(Request $request){
        $id = $request->input('id');
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
