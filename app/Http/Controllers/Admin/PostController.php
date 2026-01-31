<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'nullable|image',
            'content' => 'required',
        ]);

        $post = new Post($validated);
        $post->slug = Str::slug($request->title);
        $post->published_at = now();

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'News story created successfully!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'image' => 'nullable|image',
            'content' => 'required',
        ]);

        $post->fill($validated);
        // Only update slug if title changed (optional, maybe keep stable URL)
        // $post->slug = Str::slug($request->title); 

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'News story updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Story deleted.');
    }
}
