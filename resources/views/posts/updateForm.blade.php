<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8"'>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  <link rel='stylesheet' href="{{ asset('/css/style.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class='container'>
    <h2 class='page-header'>投稿内容を変更する</h2>
    <form action="/post/update/" method="post">
      @method('PUT')
      @csrf
      <div class="form-group">
        <input type="hidden" name="id" value="{{$post->id}}">
        <input type="text" name="upPost" value="{{$post->post}}" class="form-control" required>
      </div>
      <div class="pull-right submit-btn">
        <button type="submit" class="btn btn-primary">更新</button>
      </div>
    </form>
  </div>
  <footer>
    <small>Laravel@dawn.curriculum</small>
  </footer>
</body>

</html>
