<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SustainabilityGovernance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SustainabilityGovernanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governances = SustainabilityGovernance::ordered()->paginate(15);
        return view('admin.sustainability_governances.index', compact('governances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sustainability_governances.create');
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
            'detail' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        // Handle image upload
        if ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        } else {
            $data['image_url'] = null;
        }

        SustainabilityGovernance::create($data);

        return redirect()->route('admin.sustainability-governances.index')
            ->with('success', 'Sustainability governance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $governance = SustainabilityGovernance::findOrFail($id);
        return view('admin.sustainability_governances.show', compact('governance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $governance = SustainabilityGovernance::findOrFail($id);
        return view('admin.sustainability_governances.edit', compact('governance'));
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
            'detail' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|integer'
        ]);

        $governance = SustainabilityGovernance::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        // Handle image removal
        if ($request->has('remove_image') && $request->input('remove_image') == '1') {
            $data['image_url'] = null;
        }
        // Handle image upload
        elseif ($request->has('images') && !empty($request->input('images'))) {
            $data['image_url'] = $request->input('images')[0]; // Take first image
        }

        $governance->update($data);

        return redirect()->route('admin.sustainability-governances.index')
            ->with('success', 'Sustainability governance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governance = SustainabilityGovernance::findOrFail($id);
        $governance->delete();

        return redirect()->route('admin.sustainability-governances.index')
            ->with('success', 'Sustainability governance deleted successfully.');
    }
}
