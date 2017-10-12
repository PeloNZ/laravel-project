<?php
namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);
        
        Task::incomplete()->get();
        
        return view('tasks.show', [
            'task' => $task
        ]);
    }
}
