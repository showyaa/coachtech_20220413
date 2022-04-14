@extends('layouts.default')
<style>
  body {
    position: relative;
  }
  .content {
    width: 60%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 20px;
  }


  .add {
    margin: 30px;
  }
  .text {
    width: 80%;
    padding: 0.7em;
  }
  .text, .task {
    border: 1px solid gray;
    border-radius: 3px;
  }
  .text:focus, .task:focus {
    outline: none;
  }
  h1 {
    margin-top: 0;
    font-size: 25px;
  }


  .lists {
    margin: 30px;
  }
  .lists table {
    width: 100%;
    margin: 0 auto;
    border: 1px solid black;
  }
  .lists table td {
    text-align: center;
  }
  .task {
    margin-top: 15px;
    padding: 0.4em;
    width: 100%;
  }
  .add form{
    position: relative;
  }
  .create {
    position: absolute;
    right: 0;
    border: 2px solid #f6f;
    color: #f6f;
    }
  .create:hover {
    background: #f6f;
    color: white;
  }
  .update {
    border: 2px solid #f99;
    color: #f99;
  }
  .update:hover {
    background: #f99;
    color: white;
  }
  .delete {
    border: 2px solid #0fc;
    color: #0fc;
  }
  .delete:hover {
    background: #0fc;
    color: white;
  }
  .create, .update, .delete {
    background-color: white;
    padding: 0.6em 15px;
    border-radius: 10px;
    font-weight: bold;
    transition: 0.2s;
  }


</style>
  @section('content')
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
  @endsection