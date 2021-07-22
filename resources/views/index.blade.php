<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">
    <h1>Todo List</h1>

    <form method="post" action="{{ route('todos.create') }}" class="add_form">
        @csrf
            <input type="text" name="content" class="input_add">
            <button class="add_btn">追加</button>
    </form>


    <table class="todo-content">
        <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
        </tr>

        @foreach ($posts as $post)
        <tr>
          <td class="updated_at">
                <span>{{$post->updated_at}}</span>
          </td>

          <td class="text_content">
            <form>
                @csrf
                <input type="text" value="{{$post->content}}">
            </form>
          </td>

          <td>
            <form method="post" action="{{ route('todos.update', $post)}}">
                @csrf
                <button class="update_btn">更新</button>
            </form>
          </td>

          <td>
            <form method="post" action="{{ route('todos.destroy', $post)}}">
                @csrf
                <button class="delete_btn">削除</button>
            </form>
          </td>
        </tr>
          @endforeach

    </table>
</div>
</body>
</html>
