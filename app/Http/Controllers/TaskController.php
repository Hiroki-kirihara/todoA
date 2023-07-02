<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function showTodolistPage()
    {
        return view('todolist');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
            'title' => ['max:30'],
            'content' => ['max:140']
        ]);

        return view('create');
    }

//     public function create(Request $request)
// {
//     $validator = $request->validate([
//         'title' => ['max:30'],
//         'content' => ['max:140']
//     ]);

//     if ($validator) {
//         return view('create');
//     } else {
//         // バリデーションに失敗した場合の処理
//         return back()->withErrors($validator)->withInput();
//     }
// }


  
}