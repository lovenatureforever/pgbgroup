<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SustainabilityOverview;
use Illuminate\Http\Request;

class SustainabilityOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $overviews = SustainabilityOverview::paginate(15);
        return view('admin.sustainability_overviews.index', compact('overviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sustainability_overviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        $request->validate([
            'description_1' => 'required|string',
            'description_2' => 'required|string',
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

        SustainabilityOverview::create($data);

        return redirect()->route('admin.sustainability-overviews.index')
            ->with('success', 'Sustainability overview created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $overview = SustainabilityOverview::findOrFail($id);
        return view('admin.sustainability_overviews.show', compact('overview'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $overview = SustainabilityOverview::findOrFail($id);
        return view('admin.sustainability_overviews.edit', compact('overview'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);

        $request->validate([
            'description_1' => 'required|string',
            'description_2' => 'required|string',
            'is_active' => 'nullable|integer'
        ]);

        $overview = SustainabilityOverview::findOrFail($id);
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

        $overview->update($data);

        return redirect()->route('admin.sustainability-overviews.index')
            ->with('success', 'Sustainability overview updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $overview = SustainabilityOverview::findOrFail($id);
        $overview->delete();

        return redirect()->route('admin.sustainability-overviews.index')
            ->with('success', 'Sustainability overview deleted successfully.');
    }
}
