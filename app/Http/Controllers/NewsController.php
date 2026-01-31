<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $stories = Post::latest()->get();
        return view('news', compact('stories'));
    }

    public function show($slug)
    {
        $story = Post::where('slug', $slug)->firstOrFail();
        return view('news-detail', compact('story'));
    }
}
