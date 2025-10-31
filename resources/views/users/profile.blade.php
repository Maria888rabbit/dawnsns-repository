@extends('layouts.app')
@section('content')

  @foreach ($users as $user)
  <div>
    <h4>ユーザー名</h4>
    {{ $user->name }}
  </div>
  <div>
    <h4>自己紹介</h4>
    {{ $user->bio }}
  </div>
  @endforeach

  <a href="/profile/edit">変更画面</a>


  <h2 class='page-header'>投稿一覧</h2>
  <table class='table table-hover'>
    <tr>
      <th>名前</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
    </tr>
  @foreach ($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
    </tr>
  @endforeach
  </table>








@endsection
