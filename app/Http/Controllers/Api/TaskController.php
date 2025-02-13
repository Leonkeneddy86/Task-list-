<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all(), 200);
    }

    public function show(string $id)
    {
        return response()->json(Task::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|boolean',
            'priority' => 'required|integer',
        ]);

        $task = Task::create($validatedData);

        return response()->json($task, 201);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|boolean',
            'priority' => 'required|integer',
        ]);

        $task = Task::findOrFail($id);

        $task->update($validatedData);

        return response()->json($task, 200);
    }

    public function destroy(string $id) 
    {
        $task = Task::findOrFail($id);
        $task->delete();
    
        return response()->json(null, 204);
    }
    

}