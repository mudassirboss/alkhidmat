<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(20);
        return view('admin.galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required',
            'title' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/gallery'), $imageName);
            
            Gallery::create([
                'title' => $request->title,
                'category' => $request->category,
                'image_path' => $imageName
            ]);
        }

        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Optional: Delete file from storage
        $path = public_path('images/gallery/' . $gallery->image_path);
        if (file_exists($path)) {
            @unlink($path);
        }
        
        $gallery->delete();
        return redirect()->back()->with('success', 'Image deleted.');
    }
}
