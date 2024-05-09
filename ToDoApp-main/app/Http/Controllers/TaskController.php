<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks; // Import the Tasks model

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $account_id = $request->account_id;
        $tasks = Tasks::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        // Validate form data
        return view('tasks.store');
        $account_id = $request->input('account_id');
        $task = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'account_id' => 'required|numeric',
            'Completed' => 'required|boolean'
        ]);

        // Create new task
        $task = new Tasks(); // Corrected model name
        $task->title = $request->title;
        $task->description = $request->description; 
        $task->account_id = $request->account_id;
        $task->save();

        // Return success response
        return response()->json(['message' => 'Task created successfully'], 200);
    }
}
