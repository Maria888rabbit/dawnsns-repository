@extends('layouts.app')
@section('content')

<img src="{{ asset('images/' . $user->image) }}">

<form action="/profile/update/" method="post"  enctype="multipart/form-data">
  @method('PUT')
  @csrf
  @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif
  <!-- ユーザー名更新 -->
  <div class="form-group">
    <label>username</label>
    <input type="text" name="upName" value="{{$user->name}}" class="form-control" required>
  </div>
  <!-- アドレス更新 -->
  <div class="form-group">
    <label>MailAddress</label>
    <input type="text" name="upEmail" value="{{$user->email}}" class="form-control" required>
  </div>
  <!-- パス更新 -->
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="upPassword" class="form-control">
  </div>
  <!-- パス更新確認 -->
  <div class="form-group">
    <label>Password confirm</label>
    <input type="password" name="upPassword_confirmation" class="form-control">
  </div>
  <!-- 自己紹介更新 -->
  <div class="form-group">
    <label>Bio</label>
    <input type="text" name="upBio" value="{{$user->bio}}" class="form-control" required>
  </div>
  <!-- 画像更新 -->
   <div class="form-group">
    <label>Image</label>
    <input type="file" id="file" name="file" class="form-control">
  </div>

  <div class="pull-right submit-btn">
    <button type="submit" class="btn btn-primary">更新</button>
  </div>
</form>




@endsection
