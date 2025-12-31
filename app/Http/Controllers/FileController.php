<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function apiUploadFile(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response()->json(['error' => 'No files uploaded.'], 400);
        }

        $request->validate([
            'file' => 'required|array',
            'file.*' => 'file|mimes:jpg,jpeg,png,gif,webp,pdf,docx|max:204800',
        ]);

        $names = [];
        $originalNames = [];

        foreach ($request->file('file') as $file) {
            $imageName = uniqid() . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload'), $imageName);
            $names[] = "/upload/{$imageName}";
            $originalNames[] = $file->getClientOriginalName();
        }

        return response()->json([
            'name' => $names,
            'original_name' => $originalNames
        ]);
    }

    //add form data to database
    /*public function store(Request $request)
    {
        $messages = array(
            'images.required' => 'Image is Required.'
        );
        $this->validate($request, array(
            'images' => 'required|array|min:1',
        ),$messages);

        foreach ($request->images as $image) {
            Image::create([
                'name' => $image,
                'created_by' => Auth::id()
            ]);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Images Added Successfully');
    }*/
}
