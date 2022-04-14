<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/recet.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
  <body>
    <div class="content">
      <div class="add">
        <h1>Todo List</h1>
        <form action="/" method="post">
          @csrf
          @error('content')
          <p>{{$message}}</p>
          @enderror
          <input type="text" class="text" name="content">
          <input type="submit" class="create" formaction="{{route('todo.create')}}" value="追加">
        </form>
      </div>
      <div class="lists">
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          @foreach ($items as $item)
          <tr>
            <td>
              {{$item->created_at}}
            </td>
            <td>
            <form action="/todo/update?id={{$item->id}}" method="post">
            @csrf
              <input type="text" name="content" class="task" value="{{$item->content}}">
            </td>
            <td>
                <input type="submit" class="update" value="更新">
            </td>
            </form>
            <form action="/todo/delete?id={{$item->id}}" method="post">
            @csrf
            <td>
              <input type="submit" class="delete" value="削除">
            </td>
            </form>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>
</html>