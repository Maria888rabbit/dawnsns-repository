@extends('layouts.app')
@section('content')

<h2>フォローリスト</h2>

@foreach ($users as $user)
  <a href="/other-profile/{{ $user->id }}"><img src="/images/dawn.png"></a>
@endforeach

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
    <td>{{ $post->name }}</td>
    <td>{{ $post->post }}</td>
    <td>{{ $post->created_at }}</td>
  </tr>
  @endforeach
</table>




@endsection
