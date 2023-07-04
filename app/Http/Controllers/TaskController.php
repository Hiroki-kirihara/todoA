<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function showHomePage()
    {
        $tasks = Task::latest()->simplePaginate(3);
        return view('posts.home');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $task = new Task;
        $task -> title = $request -> title;
        $task -> contents = $request -> content;
        $task -> image_at = $request -> image;
        $task -> user_id = Auth::id();

        $task -> save();
    }

    public function edit()
    {
        return view('edit');
    }

    // public function postTask(Request $request)
    // {
    //     $validator = $request->validate([
    //         'title' => ['required', 'string', 'max:30'],
    //         'content' => ['required', 'string', 'max:140'],
    //     ]);

    //     // タスクモデルをクリエイトメソッドを使って保存するという記述
    //     Task::create([
    //         'user_id' => Auth::user()->id,

    //     // フォームに入っているtitleを格納する記述
    //         'title' => $request->title,
    //         'content' => $request->content
    //     ]);

    //     // リクエストを送ったページに戻りますよという記述
    //     return redirect()->route('todolist.create');
    // }
}