<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="unit">
                <p>Todo List</p>
                <p>「{{ $user->name }}」でログイン中</p>
                <form method="POST" action="{{ route('logout') }}">
                    <input type="submit" value="ログアウト">
                </form>
            </div>
            <form action="/todo/find" method="get">
                    @csrf
                    <input type="submit" value="タスク検索">
            </form>
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <div class="todo">
                <form action="/todo/create" method="POST">
                    @csrf
                    <input type="text" name="content">
                    <input type="submit" value="追加">
                </form>
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($todos as $todo)
                    <tr>
                        <td>
                            {{ $todo->created_at }}
                        </td>
                        <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="POST">
                            @csrf
                            <td>
                                <input type="text" value="{{ $todo->content }}" name="content">
                            </td>
                            <td>
                                <input type="submit" value="更新">
                            </td>
                        </form>
                        <td>
                            <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST">
                                @csrf
                                <input type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</body>
</html>
