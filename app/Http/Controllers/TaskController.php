<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Import the Task model
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
    $tasks = Task::all(); // Retrieve all tasks from the database
    return view('tasks.index', ['tasks' => $tasks]); // Pass tasks to the index view
        // Logic to list tasks (e.g., retrieve tasks from the database)
    }
     
    public function create()
    {
        return view('tasks.create'); // Display a form for creating tasks
         // Logic to display a form for creating tasks
    }


    public function store(Request $request)
    {
       
        $validatedData = $this->validateTaskRequest($request);
    
        Task::create($validatedData); // Create a new task in the database
    
        return redirect('/tasks')->with('success', 'Task created successfully');

        // Logic to store a newly created task in the database
    }
    

    public function edit($id)
    {
        $task = Task::findOrFail($id); // Find the task by ID
        return view('tasks.edit', ['task' => $task]); // Display a form for editing the task
        // Logic to display a form for editing a specific task
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
    
        $task = Task::findOrFail($id); // Find the task by ID
        $task->update($validatedData); // Update the task in the database
    
        return redirect('/tasks')->with('success', 'Task updated successfully');
        // Logic to update a specific task in the database
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Find the task by ID
    $task->delete(); // Delete the task from the database

    return redirect('/tasks')->with('success', 'Task deleted successfully');
        // Logic to delete a specific task from the database
    }

     public function show($id)
   {
        $task = Task::findOrFail($id); // Find the task by ID
    return view('tasks.show', ['task' => $task]); // Display the task details in a view
   }

    
protected function validateTaskRequest(Request $request)
{
   //dd('Validation triggered'); // Add this line
    return $request->validate([
        'title' => [
            'required',
            'string',
            'max:155',
            // Add a regex rule to disallow specific characters
            'regex:/^[a-zA-Z0-9\s\-]+$/',
          ],

        'description' => 'required|string|max:255',
    ], [
        'title.required' => 'The title field is required.',
        'title.regex' => 'The title contains invalid characters.',
        'description.required' => 'The description field is required.',
    ]);
}
}


