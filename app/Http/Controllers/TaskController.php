<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //tasks
    public function index(Request $request)
    {
        if (request()->is('index')) {
            $user = Auth::user();
            $tasks = Task::where('user_id', '=', $user->id)->get();
            $title = "Your Tasks";
            return view('tasks.index', compact('tasks', 'title'));
        } else {
            $tasks = Task::where('public', '=', '1')->get();
            $title = "Public Tasks";
            return view('tasks.index', compact('tasks', 'title'));
        }
    }

    public function edit(Request $request) {
        if ($request->id) {
            $task = Task::find($request->id);
        } else {
            $task = new Task;
        }
        return view('tasks.edit', compact('task'));
    }

    public function store(Request $request)
    {
        if ($request->id) {     
            $task = Task::find($request->id);
        } else {
            $user = Auth::user();
            $task = new Task;
            $task->user_id = $user->id; 
        }
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect('index');
    }

    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('index');
    }
    public function detail(Request $request)
    {
        $task = Task::find($request->id);
        return view('tasks.detail', compact('task'));
    }
    public function chnageStatus(Request $request)
    {
        $task = Task::find($request->id);
        if ($task->public) {
            $task->public = 0;
        } else {
            $task->public = 1;
        }
        $task->save();
        return redirect('index');
    }
    public function postComment(Request $request)
    {
        $comment = new Comment();
        $comment->comment_text = $request->comment_text;
        $comment->task_id = $request->task_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('detail/?id=' . $request->task_id); //follow nested routing
    }
    public function test()
    {
        return view('tasks.testIndex');
    }
}
