<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch active sliders
        $sliders = Slider::where('is_active', true)->orderBy('order_index', 'asc')->get();

        return view('home', compact('sliders'));
    }
}
