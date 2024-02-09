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
        if (request()->is('add')) {
            $title = "Add Task ";
            return view('tasks.index', compact('title'));
            // show companies menu or something
        } else {
            $title = "Edit Task ";
            $task = Task::find($request->id);

            return view('tasks.index', compact('task', 'title'));
        }
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $task = new Task;
        $task->title = $request->title;
        $task->desce = $request->desce;
        $task->status = $request->status;
        $task->user_id = $user->id; //use id   // use User_id as parameter
        $task->save();
        return redirect('/task/my-task');
    }
    public function show(Request $request)
    {
        $tasks = Task::where('public', '=', '1')->get();
        return view('tasks.show', compact('tasks'));
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $task->title = $request->title;
        $task->desce = $request->desce;
        $task->status = $request->status;
        $task->save();
        return redirect('/task/my-task');
    }
    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect('/task/my-task');
    }
    public function detail(Request $request)
    {
        $task = Task::find($request->id);
        return view('tasks.detail', compact('task'));
    }
    public function myTask(Request $request)
    {
        $user = Auth::user();
        $tasks = Task::where('user_id', '=', $user->id)->get();
        return view('tasks.personal', compact('tasks'));
    }
    public function makePublic(Request $request)
    {
        $task = Task::find($request->id);
        if ($task->public) {
            $task->public = 0;
        } else {
            $task->public = 1;
        }
        $task->save();
        return redirect('/task/my-task');
    }

    public function postComment(Request $request)
    {
        $comment = new Comment();
        $comment->comment_text = $request->comment_text;
        $comment->task_id = $request->task_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('/task/detail/?id=' . $request->task_id); //follow nested routing
    }
}
