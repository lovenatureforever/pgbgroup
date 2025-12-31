<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenInitiative;
class GreenInitiativeController extends Controller
{
    public function index() {
        $items = GreenInitiative::with('images')->orderByDesc('date')->paginate(10);
        return view('admin.green_initiatives.index', compact('items'));
    }
    public function create() {
        return view('admin.green_initiatives.create');
    }
    public function store(Request $request) {
        $data = $request->validate([
            'date' => 'nullable|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $item = GreenInitiative::create($data);
        // Save uploaded images to images table if present
        if ($request->has('images')) {
            foreach ($request->input('images') as $i => $url) {
                $item->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }
        return redirect()->route('admin.green_initiatives.edit', $item->id)->with('success', 'Created successfully. You can now add images.');
    }
    public function edit($id) {
        $item = GreenInitiative::with('images')->findOrFail($id);
        return view('admin.green_initiatives.edit', compact('item'));
    }
    public function update(Request $request, $id) {
        $item = GreenInitiative::findOrFail($id);
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
        return redirect()->route('admin.green_initiatives.index')->with('success', 'Updated successfully.');
    }
    public function destroy($id) {
        $item = GreenInitiative::findOrFail($id);
        $item->delete();
        return redirect()->route('admin.green_initiatives.index')->with('success', 'Deleted successfully.');
    }
}
