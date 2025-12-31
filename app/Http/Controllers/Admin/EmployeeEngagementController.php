<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeEngagement;
class EmployeeEngagementController extends Controller
{
    public function index() {
        $items = EmployeeEngagement::with('images')->orderByDesc('date')->paginate(10);
        return view('admin.employee_engagements.index', compact('items'));
    }
    public function create() {
        return view('admin.employee_engagements.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'date' => 'nullable|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $item = EmployeeEngagement::create($data);
        // Save uploaded images to images table if present
        if ($request->has('images')) {
            foreach ($request->input('images') as $i => $url) {
                $item->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }
        return redirect()->route('admin.employee_engagements.edit', $item->id)->with('success', 'Created successfully. You can now add images.');
    }
    public function edit($id) {
        $item = EmployeeEngagement::with('images')->findOrFail($id);
        return view('admin.employee_engagements.edit', compact('item'));
    }
    public function update(Request $request, $id) {
        $item = EmployeeEngagement::findOrFail($id);
        $data = $request->validate([
            'date' => 'nullable|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $item->update($data);
        // Save uploaded images to images table if present
        if ($request->has('images')) {
            $item->images()->delete();
            foreach ($request->input('images') as $i => $url) {
                $item->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }
        return redirect()->route('admin.employee_engagements.edit', $item->id)->with('success', 'Updated successfully.');
    }
    public function destroy($id) {
        $item = EmployeeEngagement::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.employee_engagements.index')->with('success', 'Deleted successfully.');
    }
}
