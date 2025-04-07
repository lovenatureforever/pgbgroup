<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'images' => 'required|array|min:1|max:20',
            'images.*' => 'required|string',
        ]);

        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'status' => $validated['status'],
            'slug' => Str::slug($validated['title']).'-'.uniqid(),
        ]);

        foreach ($validated['images'] as $index => $image) {
            $project->images()->create([
                'url' => $image,
                'position' => $index + 1,
            ]);
        }

        return redirect()->route('admin.projects.index')
                    ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.pages.projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'images' => 'sometimes|array|max:20',
            'images.*' => 'required|string',
        ]);

        // Update project attributes
        $project->update([
            'title' => $validated['title'],
            'description' => empty($validated['description']) ? null : $validated['description'],
            'category' => empty($validated['category']) ? null : $validated['category'],
            'status' => empty($validated['status']) ? null : $validated['status'],
        ]);

        if (isset($validated['images'])) {
            $project->images()->delete();

            // Add new images
            foreach ($validated['images'] as $index => $image) {
                $project->images()->create([
                    'url' => $image,
                    'position' => $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
                    ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully.'], ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Project.', 'details' => $e->getMessage()], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function publish(Project $project)
    {
        $project->is_published = true;
        $project->save();

        return response()->json(['message' => 'Project published.', 'project' => $project]);
    }

    public function archive(Project $project)
    {
        $project->is_published = false;
        $project->save();

        return response()->json(['message' => 'Project archived.', 'project' => $project]);
    }

    public function apiIndex()
    {
        $projects = Project::with(['images:id,viewable_id,viewable_type,url'])->get();
        return response()->json(['data' => $projects], ResponseAlias::HTTP_OK);
    }
}
