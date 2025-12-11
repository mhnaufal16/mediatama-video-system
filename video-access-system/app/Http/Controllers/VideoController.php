<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = \App\Models\Video::with('category')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.videos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        \App\Models\Video::create($request->all());

        return redirect()->route('admin.videos.index')->with('success', 'Video created successfully.');
    }

    public function edit(\App\Models\Video $video)
    {
        $categories = \App\Models\Category::all();
        return view('admin.videos.edit', compact('video', 'categories'));
    }

    public function update(Request $request, \App\Models\Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $video->update($request->all());

        return redirect()->route('admin.videos.index')->with('success', 'Video updated successfully.');
    }

    public function destroy(\App\Models\Video $video)
    {
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
    }
}
