<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::with('images')->orderByDesc('receive_date')->get();
        return view('admin.pages.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.pages.awards.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'receive_date' => 'required|date',
            'images' => 'required|array|min:1|max:20',
            'images.*' => 'required|string',
        ]);
        $award = Award::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'receive_date' => $validated['receive_date'],
        ]);

        // Remove duplicate image URLs
        $uniqueImages = array_values(array_unique($validated['images']));
        foreach ($uniqueImages as $index => $image) {
            $award->images()->create([
                'url' => $image,
                'position' => $index + 1,
            ]);
        }

        return redirect()->route('admin.awards.index')->with('success', 'Award created successfully.');
    }

    public function edit(Award $award)
    {
        $award->load('images');
        return view('admin.pages.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'receive_date' => 'required|date',
            'images' => 'sometimes|array|max:20',
            'images.*' => 'required|string',
        ]);
        $award->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'receive_date' => $validated['receive_date'],
        ]);

        if (isset($validated['images'])) {
            $award->images()->delete();
            $uniqueImages = array_values(array_unique($validated['images']));
            foreach ($uniqueImages as $index => $image) {
                $award->images()->create([
                    'url' => $image,
                    'position' => $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy(Award $award)
    {
    // Delete all related images before deleting the award
    $award->images()->delete();
    $award->delete();
    return redirect()->route('admin.awards.index')->with('success', 'Award deleted successfully.');
    }
}
