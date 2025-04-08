<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.slides.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:8196',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'text_align' => 'nullable|string|max:255',
            'effect' => 'nullable|string|max:255',
            'button_type' => 'nullable|string|max:255',
            'text_effect' => 'nullable|string|max:255',
            'text_color' => 'nullable|string|max:255',
            'text_style' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload'), $filename);
            $validated['image'] = 'upload/' . $filename;
        }

        Slide::create($validated);

        return redirect()->route('admin.slides.index')->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.pages.slides.edit')->with('slide', $slide);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:8196',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'text_align' => 'nullable|string|max:255',
            'effect' => 'nullable|string|max:255',
            'button_type' => 'nullable|string|max:255',
            'text_effect' => 'nullable|string|max:255',
            'text_color' => 'nullable|string|max:255',
            'text_style' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Optional: Delete old image file
            Storage::delete('uploads/' . $slide->image);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validated['image'] = 'uploads/' . $filename;
        }
        else {
            $validated['image'] = $slide->image;
        }

        $slide->update($validated);

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        try {
            $slide->delete();
            return response()->json(['message' => 'Slide deleted successfully.'], ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Slide.', 'details' => $e->getMessage()], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function publish(Slide $slide)
    {
        $slide->is_published = true;
        $slide->save();

        return response()->json(['message' => 'Slide published.', 'project' => $slide]);
    }

    public function archive(Slide $slide)
    {
        $slide->is_published = false;
        $slide->save();

        return response()->json(['message' => 'Slide archived.', 'project' => $slide]);
    }

    public function apiIndex()
    {
        $slides = Slide::orderBy('position')->get();
        return response()->json(['data' => $slides], ResponseAlias::HTTP_OK);
    }
}
