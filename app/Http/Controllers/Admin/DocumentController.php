<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->paginate(20);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required_without:url|string|max:255',
            'type' => 'nullable|string|max:255',
        ]);


        $url = "";
        if ($request->has('images')) {
            foreach ($request->input('images') as $i => $url_image) {
                $url = $url_image;
            }
        } else {
            $url = $request->input('url');
        }

        $fileName = $request->input('file_name');



        Document::create([
            'file_name' => $fileName,
            'url' => $url,
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document saved successfully!');
    }
    

    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        $document->update([
            'file_name' => $request->input('file_name'),
            'url' => $request->input('url'),
            'type' => $request->input('type'),
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully!');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully!');
    }
}
