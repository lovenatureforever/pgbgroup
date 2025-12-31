<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderByDesc('news_date')->paginate(15);
        return view('admin.pages.news.index', compact('news'));
    }
    public function create() {
        return view('admin.pages.news.create');
    }
    public function store(Request $request) {



        $validated = $request->validate([
            'news_date' => 'required|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|string|max:255',
        ]);
        $news = News::create($validated);

        // Save uploaded images to images table if present
        if ($request->has('images')) {
            foreach ($request->input('images') as $i => $url) {
                $news->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }

        return redirect()->route('admin.news.edit', $news->id)->with('success', 'News created. You can now add images.');
    }
    public function edit($id) {
        $news = News::with('images')->findOrFail($id);
        return view('admin.pages.news.edit', compact('news'));
    }
    public function update(Request $request, $id) {
        $news = News::findOrFail($id);
        $validated = $request->validate([
            'news_date' => 'required|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|string|max:255',
            'images' => 'required|array|min:1|max:20',
            'images.*' => 'required|string',
        ]);
        $news->update($validated);



        // Save uploaded images to images table if present
        if ($request->has('images')) {
            // Optionally, remove old images if you want to fully replace
            $news->images()->delete();
            foreach ($request->input('images') as $i => $url) {
                $news->images()->create([
                    'url' => $url,
                    'position' => $i,
                ]);
            }
        }

        return redirect()->route('admin.news.index', $news->id)->with('success', 'News updated.');
    }
    public function destroy($id) {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted.');
    }
    /**
     * DataTables API endpoint for News Management
     */
    public function apiIndex(Request $request)
    {
        $news = News::with('images')->orderByDesc('news_date')->get();
        $data = $news->map(function($item) {
            return [
                'id' => $item->id,
                'images' => $item->images->map(function($img) { return ['url' => $img->url]; }),
                'news_date' => $item->news_date,
                'title' => $item->title,
                'status' => $item->status ?? 'Active',
            ];
        });
        return response()->json([
            'data' => $data,
        ]);
    }
}
