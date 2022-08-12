<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $param = ['todos' => $todos, 'user' => $user];
        return view('index', $param);
    }

    public function create(TodoRequest $request)
    {
        $form = $request->all();
        Todo::create($form);
        return redirect('/');
    }

    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    public function find()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $param = ['todos' => $todos, 'user' => $user];
        return view('find', $param, ['input' => '']);
    }
    public function search(Request $request)
    {
        $todo = Todo::where('content', 'LIKE BINARY', "%{$request->input}%")->get();
        $param = [
            'input' => $request->input,
            'todo' => $todo
        ];
        return view('find', $param);
    }

}

// public function index()
//     {
//         $todos = Todo::all();
//         return view('index', ['todos' => $todos]);
//     }
