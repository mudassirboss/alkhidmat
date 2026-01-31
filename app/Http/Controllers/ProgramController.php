<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.show', ['program' => $program, 'slug' => $slug]);
    }
}
