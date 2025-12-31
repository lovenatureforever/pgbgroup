<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerformanceHighlight;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerformanceHighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $highlights = PerformanceHighlight::ordered()->paginate(15);
        return view('admin.performance_highlights.index', compact('highlights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.performance_highlights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'sort_order' => $request->has('sort_order') ? (int) $request->input('sort_order') : null,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'pillar' => 'required|in:Economic Pillar,Environmental Pillar,Governance Pillar,Social Pillar',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['url'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        } else {
            $data['image_url'] = null;
        }

        PerformanceHighlight::create($data);

        return redirect()->route('admin.performance-highlights.index')
            ->with('success', 'Performance highlight created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $highlight = PerformanceHighlight::findOrFail($id);
        return view('admin.performance_highlights.show', compact('highlight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $highlight = PerformanceHighlight::findOrFail($id);
        return view('admin.performance_highlights.edit', compact('highlight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'sort_order' => $request->has('sort_order') ? (int) $request->input('sort_order') : null,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'pillar' => 'required|in:Economic Pillar,Environmental Pillar,Governance Pillar,Social Pillar',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $highlight = PerformanceHighlight::findOrFail($id);
        $data = $request->all();
        $data['url'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        // Handle image removal
        if ($request->has('remove_image') && $request->input('remove_image') == '1') {
            $data['image_url'] = null;
        }
        // Handle image upload
        elseif ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        }

        $highlight->update($data);

        return redirect()->route('admin.performance-highlights.index')
            ->with('success', 'Performance highlight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $highlight = PerformanceHighlight::findOrFail($id);
        $highlight->delete();

        return redirect()->route('admin.performance-highlights.index')
            ->with('success', 'Performance highlight deleted successfully.');
    }
}
