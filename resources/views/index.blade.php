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
            <input type="text" value="{{$item->content}}">
          </td>
          <td>
            <form action="/todo/update" method="post">
              @csrf
              <input type="submit" formaction="{{route('todo.update')}}" value="更新">
            </form>
          </td>
          <td>
            <input type="submit" formaction="{{route('todo.delete')}}" value="削除">
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  @endsection