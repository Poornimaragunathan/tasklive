<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\First;

class FirstController extends Controller
{
    public function index()
    {
        $first = First::get();
        return view('welcome', compact('first'));
    }

    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    public function create()
    {
        return view('first.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'completed' => 'sometimes',
        ]);

        First::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed == true ? 1:0, 
        ]);

        return redirect('first/create')->with('success', 'Task created successfully!');
    }

    public function edit(int $id)
    {
        $edit = First::findORFail($id);        
        return view('first.edit', compact('edit'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'completed' => 'sometimes',
        ]);

        First::findORFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed == true ? 1:0, 
        ]);

        return redirect()->back()->with('success', 'Task updated successfully!');
    }

    public function delete(int $id)
    {

        $task = First::findORFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }  
}
