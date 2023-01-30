<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

use function GuzzleHttp\Promise\task;

class TaskController extends Controller

{
    public function index(Request $request) {
        // if ($request->search) {
        //     return $this->taskList[request()->search()]; 
        // }
        // return $this->taskList;
        if ($request -> search){
            $task = Task::where('task', 'LIKE', "%$request->search%")->get();
            return $task;
        }

        $task = Task::all();
        return $task;
    }

    public function show($id) {
        $task = Task::find($id);
        return $task;
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){
        // $this->taskList[$request->key] = $request->task;
        // return $this->taskList;
        Task::create([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'Success!';
    }

    public function edit($id){
        return view('task.edit');
    }

    public function update(Request $request, $id){
        // $this->taskList[$key] = $request->task;
        // return $this->taskList;
        $task = Task::find($id);
        $task->update([
            'task' => $request->task,
            'user' => $request->user
        ]);
        return 'Success!';
    }

    public function delete($id){
        // unset($this->taskList[$key]);
        // return $this->taskList;
        Task::where('id', $id)->delete();
        return 'Success';
    }

}
