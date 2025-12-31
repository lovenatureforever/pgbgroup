<?php

namespace App\Http\Controllers;

use App\Models\PressRelease;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    public function index()
    {
        $pressReleases = PressRelease::orderByDesc('release_data')->get();
        return view('admin.pages.press_release.index', compact('pressReleases'));
    }

    public function create()
    {
        return view('admin.pages.press_release.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'release_data' => 'required|date',
            'name' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
        ]);
        PressRelease::create($validated);
        return redirect()->route('admin.press-releases.index')->with('success', 'Press Release created successfully.');
    }

    public function edit(PressRelease $pressRelease)
    {
        return view('admin.pages.press_release.edit', compact('pressRelease'));
    }

    public function update(Request $request, PressRelease $pressRelease)
    {
        $validated = $request->validate([
            'release_data' => 'required|date',
            'name' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
        ]);
        $pressRelease->update($validated);
        return redirect()->route('admin.press-releases.index')->with('success', 'Press Release updated successfully.');
    }

    public function destroy(PressRelease $pressRelease)
    {
        $pressRelease->delete();
        return redirect()->route('admin.press-releases.index')->with('success', 'Press Release deleted successfully.');
    }
}
