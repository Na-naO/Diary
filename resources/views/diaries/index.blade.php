<!-- Hello View -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>新規投稿画面</title>
  <title>一覧表示画面</title>
</head>
<body>
<a href="{{ route('diary.create') }}" class="btn btn-primary btn-block">
  新規投稿
</a>
  @foreach ($diaries as $diary)
    <div class="m-4 p-4 border border-primary">
      <p>{{ $diary->title }}</p>
      <p>{{ $diary->body }}</p>
      <p>{{ $diary->created_at }}</p>
      <a class="btn btn-success" href="{{ route('diary.edit', ['id' => $diary->id]) }}">編集</a>
      <form action="{{ route('diary.destroy', ['id' => $diary->id]) }}" method="POST" class="d-inline">
        @csrf
        @method('delete')
        <button class="btn btn-danger">削除</button>
      </form>
    </div>
  @endforeach
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>