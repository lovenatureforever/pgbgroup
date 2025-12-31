<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommunityImpact;
class CommunityImpactController extends Controller
{
    public function index() {
        $items = CommunityImpact::with('images')->orderByDesc('date')->paginate(10);
        return view('admin.community_impacts.index', compact('items'));
    }
    public function create() {
        return view('admin.community_impacts.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'date' => 'nullable|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $item = CommunityImpact::create($data);
        // Save uploaded images to images table if present
        if ($request->has('images')) {
            foreach ($request->input('images') as $i => $url) {
                $item->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }
        return redirect()->route('admin.community_impacts.edit', $item->id)->with('success', 'Created successfully. You can now add images.');
    }
    public function edit($id) {
        $item = CommunityImpact::with('images')->findOrFail($id);
        return view('admin.community_impacts.edit', compact('item'));
    }
    public function update(Request $request, $id) {
        $item = CommunityImpact::findOrFail($id);
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
        return redirect()->route('admin.community_impacts.edit', $item->id)->with('success', 'Updated successfully.');
    }
    public function destroy($id) {
        $item = CommunityImpact::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.community_impacts.index')->with('success', 'Deleted successfully.');
    }
}
