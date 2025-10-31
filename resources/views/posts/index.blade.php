@extends('layouts.app')
@section('content')

<div class='container'>
  <h1 class='page-header'>Laravelを使った投稿機能の実装</h1>
  <form action="/post/create" method="post">
    @csrf
    <div class="form-group">
      <input type="text" name="newPost" class="form-control" placeholder="投稿内容">
    </div>
    <div class="pull-right submit-btn">
      <button type="submit" class="btn btn-success">追加</button>
    </div>
  </form>

  <h2 class='page-header'>投稿一覧</h2>
  <table class='table table-hover'>
    <tr>
      <th>名前</th>
      <th>投稿内容</th>
      <th>投稿日時</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>
      <td><a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">更新</a></td>
      <td>
        <form action="/post/delete" method="post" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
          @method('DELETE')
          @csrf
          <input type="hidden" name="id" value="{{ $post->id }}">
          <button type="submit" class="btn btn-danger">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
