<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        try {
            $projects = Project::withCount('tasks')
                ->latest()
                ->paginate(10);

            return response()->json($projects);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to fetch projects'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'        => 'required|string|max:255|unique:projects,name',
                'description' => 'nullable|string',
            ]);

            $project = Project::create($validated);

            return response()->json([
                'message' => 'Project created successfully',
                'data' => $project
            ], 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to create project'], 500);
        }
    }

    public function show($id)
    {
        try {
            $project = Project::withCount('tasks')->findOrFail($id);
            return response()->json($project);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Project not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name'        => 'required|string|max:255|unique:projects,name,' . $id,
                'description' => 'nullable|string',
            ]);

            $project = Project::findOrFail($id);
            $project->update($validated);

            return response()->json([
                'message' => 'Project updated successfully',
                'data' => $project
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to update project'], 500);
        }
    }

   
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            return response()->json([
                'message' => 'Project deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to delete project'], 500);
        }
    }
}
