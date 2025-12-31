<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SustainabilityReport;
use Illuminate\Http\Request;

class SustainabilityReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = SustainabilityReport::paginate(15);
        return view('admin.sustainability_reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sustainability_reports.create');
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
            'description' => 'required|string',
            'is_active' => 'nullable|integer'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        SustainabilityReport::create($data);

        return redirect()->route('admin.sustainability-reports.index')
            ->with('success', 'Sustainability report created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = SustainabilityReport::findOrFail($id);
        return view('admin.sustainability_reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = SustainabilityReport::findOrFail($id);
        return view('admin.sustainability_reports.edit', compact('report'));
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
            'description' => 'required|string',
            'is_active' => 'nullable|integer'
        ]);

        $report = SustainabilityReport::findOrFail($id);
        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $report->update($data);

        return redirect()->route('admin.sustainability-reports.index')
            ->with('success', 'Sustainability report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = SustainabilityReport::findOrFail($id);
        $report->delete();

        return redirect()->route('admin.sustainability-reports.index')
            ->with('success', 'Sustainability report deleted successfully.');
    }
}
