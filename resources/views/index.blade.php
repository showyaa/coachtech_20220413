@extends('layouts.default')
  @section('content')
    <div class="add">
      <h1>Todo List</h1>
      <form action="/" method="post">
        @csrf
        <input type="text" name="content">
        <input type="submit" class="submit" formaction="{{route('todo.create')}}" value="追加">
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
            <input type="text" value="{{$item->content}}">
          </td>
          <td>
              <input type="submit" value="更新">
          </td>
          </form>
          <form action="/todo/delete?id={{$item->id}}" method="post">
          @csrf
          <td>
            <input type="submit" value="削除">
          </td>
          </form>
        </tr>
        @endforeach
      </table>
    </div>
  @endsection