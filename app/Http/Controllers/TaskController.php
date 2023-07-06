<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function showHomePage()
    {
        $tasks = Task::latest()->simplePaginate(4);
        return view('posts.home', ['tasks'=>$tasks]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => ['required', 'string', 'max:30'],
            'content' => ['required', 'string', 'max:140'],
            'image' => ['required'],
        ]);

        // dd($request);
        $task = new Task;
        $task -> title = $request -> title;
        $task -> contents = $request -> content;
        $task -> image_at = $request -> image;
        $task -> user_id = Auth::id();

        $task -> save();

        return redirect()->route('posts.home');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('posts.edit',['task'=>$task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task -> title = $request -> title;
        $task -> contents = $request -> content;
        $task -> image_at = $request -> image;

        $task -> save();

        return redirect()->route('posts.home',compact('task'));
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('posts.home');
    }

}