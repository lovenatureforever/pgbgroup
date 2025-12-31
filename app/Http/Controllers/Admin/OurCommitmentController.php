<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurCommitment;
use Illuminate\Http\Request;

class OurCommitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commitments = OurCommitment::ordered()->paginate(15);
        return view('admin.our_commitments.index', compact('commitments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_commitments.create');
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
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        } else {
            $data['image_url'] = null;
        }

        OurCommitment::create($data);

        return redirect()->route('admin.our-commitments.index')
            ->with('success', 'Our commitment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commitment = OurCommitment::findOrFail($id);
        return view('admin.our_commitments.show', compact('commitment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $commitment = OurCommitment::findOrFail($id);
        return view('admin.our_commitments.edit', compact('commitment'));
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
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $commitment = OurCommitment::findOrFail($id);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        // Handle image removal
        if ($request->has('remove_image') && $request->input('remove_image') == '1') {
            $data['image_url'] = null;
        }
        // Handle image upload
        elseif ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        }

        $commitment->update($data);

        return redirect()->route('admin.our-commitments.index')
            ->with('success', 'Our commitment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commitment = OurCommitment::findOrFail($id);
        $commitment->delete();

        return redirect()->route('admin.our-commitments.index')
            ->with('success', 'Our commitment deleted successfully.');
    }
}
