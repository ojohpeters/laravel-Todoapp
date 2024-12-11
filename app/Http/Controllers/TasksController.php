<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use Illuminate\Http\Request;
use App\Models\Todoapp;
use Illuminate\Support\Facades\Storage;

class TasksController extends Controller
{
    //
    public function tasks()
    {
        $tasks = auth()->user()->todoapps;
        return view('tasks.tasks', ['tasks' => $tasks]);
    }
    public function createform()
    {
        return view('tasks.create');
    }
    public function createtask(StoreTodoRequest $request)
{
    try {
        $validatedRequest = $request->validated();
        $validatedRequest['tasks'] = $validatedRequest['taskname'];
        unset($validatedRequest['taskname']);

        // Handle file upload if a photo was provided
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('task-photos', 'public');
            $validatedRequest['photo'] = $path;
        }

        // Use the authenticated user to create the task
        $user = auth()->user(); // Get the currently authenticated user`
        $user->todoapps()->create($validatedRequest);

        return redirect()->route('user.tasks')->with('success', 'Task created successfully');
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
}


    public function edittaskform(Request $request)
    {
        try {
            $id = $request->input('taskid');
            $task = Todoapp::where('id', $id)->get();
            return view('tasks.edit', ['task' => $task]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function makeedit(UpdateTodoRequest $request)
    {
        $validatedRequest = $request->validated();
        $id = $validatedRequest['id'];
        function deletePhoto($filePath){
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }
        return false;
       }
        // unset($validatedRequest['taskname']);
        $task = auth()->user()->todoapps()->find($id);
        // $task = Todoapp::find($id);
        $task->tasks = $validatedRequest['taskname'];
        $task->description = $validatedRequest['description'];
        $task->completed =  $validatedRequest['completed'];
        if ($request->hasFile('photo')) {
            deletePhoto($task->photo);
            $path = $request->file('photo')->store('task-photos', 'public');
            $validatedRequest['photo'] = $path;
            $task->photo = $validatedRequest['photo'];
        }
        $task->save();
        return redirect()->route('user.tasks');
    }

    public function deletetask(Request $request)
    {
       try {
        $task = Todoapp::find($request->taskid);
        if ($task){
            $task->delete();   
            return redirect()->route('user.tasks');
        }
        return 'Error Deleting '. $task;
       } catch (\Throwable $th) {
        return 'Error Deleting task<br>'.$th;
       }
        
    }

    public function searchtask(Request $request)
    {
        $search = $request->validate([
            'search' => 'required|string|min:3', 
        ]);
        $tasks = auth()->user()->todoapps()->where(function($query) use ($search) {
                        $query->where('tasks', 'like', '%' . $search['search'] . '%')
                              ->orWhere('description', 'like', '%' . $search['search'] . '%');
                    })
                    ->get();
    
        return view('tasks.search', ['tasks' => $tasks, 'search' => $search['search']]);
    }
    
    
}
