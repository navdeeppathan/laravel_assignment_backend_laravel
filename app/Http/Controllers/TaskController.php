<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        try {
            $tasks = Task::with('project')
                ->when($request->project_id, fn ($q) =>
                    $q->where('project_id', $request->project_id)
                )
                ->when($request->status, fn ($q) =>
                    $q->where('status', $request->status)
                )
                ->when($request->search, fn ($q) =>
                    $q->where('title', 'like', '%' . $request->search . '%')
                )
                ->latest()
                ->paginate(10);

            return response()->json($tasks);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to fetch tasks'], 500);
        }
    }

    
public function show($id)
{
    try {
        $task = Task::with('project')->findOrFail($id);
        return response()->json([
            'message' => 'Task fetched successfully',
            'data' => $task
        ]);
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        return response()->json(['error' => 'Task not found'], 404);
    }
}


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'project_id' => 'required|integer|exists:projects,id',
                'title'      => 'required|string|max:255',
                'status'     => 'required|string|in:pending,in_progress,completed',
                'due_date'   => 'nullable|date',
            ]);

            $task = Task::create($validated);

            return response()->json([
                'message' => 'Task created successfully',
                'data' => $task
            ], 201);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to create task'], 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'project_id' => 'required|integer|exists:projects,id',
                'title'      => 'required|string|max:255',
                'status'     => 'required|string|in:pending,in_progress,completed',
                'due_date'   => 'nullable|date',
            ]);

            $task = Task::findOrFail($id);
            $task->update($validated);

            return response()->json([
                'message' => 'Task updated successfully',
                'data' => $task
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to update task'], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return response()->json([
                'message' => 'Task deleted successfully'
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to delete task'], 500);
        }
    }

   
    public function updateStatus(Request $request)
    {
        try {
            $validated = $request->validate([
                'id'     => 'required|integer|exists:tasks,id',
                'status' => 'required|string|in:pending,in_progress,completed',
            ]);

            $task = Task::findOrFail($validated['id']);
            $task->update(['status' => $validated['status']]);

            return response()->json([
                'message' => 'Status updated successfully',
                'data' => $task
            ]);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
