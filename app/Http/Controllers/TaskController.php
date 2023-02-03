<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller

{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        // if ($request->search) {
        //     return $this->taskList[request()->search()]; 
        // }
        // return $this->taskList;
        if ($request -> search){
            $task = Task::where('task', 'LIKE', "%$request->search%")->get();
            return $task;
        }

        $task = Task::paginate(5);
        return view('task.index', [
            'data' => $task
        ]);
    }

    public function show($id) {
        $task = Task::find($id);
        return $task;
    }

    public function create(){
        return view('task.create');
    }

    public function store(TaskRequest $request){
        // $this->taskList[$request->key] = $request->task;
        // return $this->taskList;
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }

    public function edit($id){
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id){
        // $this->taskList[$key] = $request->task;
        // return $this->taskList;
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return redirect('/tasks');
    }

    public function delete($id){
        // unset($this->taskList[$key]);
        // return $this->taskList;
        Task::where('id', $id)->delete();
        return redirect('/tasks');
    }

}
