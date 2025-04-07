<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request inline
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|string',
        ]);

        // Create the Blog
        $blog = Blog::create([
            'image' => $validated['image'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => Str::slug($validated['title']) . '-' . uniqid(),
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('blogs', 'public');
        //     $blog->image = $imagePath;
        // }

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.blogs.show')->with('blog', Blog::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.blogs.edit')->with('blog', Blog::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Validate the request inline
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
            'image' => 'sometimes|string',
        ]);

        /* if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        } */

        $blog->update($validated);
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            return response()->json(['message' => 'Blog deleted successfully.'], ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete blog.', 'details' => $e->getMessage()], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function publish(Blog $blog)
    {
        $blog->is_published = true;
        $blog->published_at = now();
        $blog->save();

        return response()->json(['message' => 'Blog published.', 'blog' => $blog]);
    }

    public function archive(Blog $blog)
    {
        $blog->is_published = false;
        $blog->published_at = null;
        $blog->save();

        return response()->json(['message' => 'Blog archived.', 'blog' => $blog]);
    }

    public function apiIndex()
    {
        $blogs = Blog::all();
        return response()->json(['data' => $blogs], ResponseAlias::HTTP_OK);
    }
}
