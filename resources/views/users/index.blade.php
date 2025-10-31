@extends('layouts.app')
@section('content')

  <form action="/result" method="post">
    @csrf
    <div class="form-group">
      <input type="text" name="username" class="form-control" placeholder="ユーザー名">
    </div>
    <div class="pull-right submit-btn">
      <button type="submit" class="btn btn-success">検索</button>
    </div>
  </form>
<table class='table table-hover'>
  <tr>
    <th>画像</th>
    <th>名前</th>
    <th></th>
  </tr>
  @foreach ($users as $user)
  <tr>
    <td><img src="/images/dawn.png"></td>
    <td>{{ $user->name }}</td>
    <td>
      @if($follows->contains('user_id', $user->id))
        <form action="/follow/delete" method="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <div class="pull-right submit-btn">
            <button type="submit" class="btn btn-danger">フォローを外す</button>
          </div>
        </form>
      @else
        <form action="/follow/create" method="post">
          @csrf
          <input type="hidden" name="user_id" value="{{ $user->id }}">
          <div class="pull-right submit-btn">
            <button type="submit" class="btn btn-success">フォローする</button>
          </div>
        </form>
      @endif
    </td>
  </tr>
  @endforeach
</table>

@endsection
