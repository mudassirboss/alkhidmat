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

        // Fetch leadership members
        $leadership = \App\Models\TeamMember::where('is_active', true)
                                            ->where('is_in_leadership', true)
                                            ->orderBy('order_index')
                                            ->get();

        return view('home', compact('sliders', 'leadership'));
    }
}
