<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs.index', compact('programs'));
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image_hero' => 'nullable|image',
            // Simple validation for arrays?
            'features' => 'required'
        ]);

        $program->title = $request->title;
        $program->subtitle = $request->subtitle;
        $program->description = $request->description;

        // Process Features (Textarea -> Array)
        // Assume features are newline separated
        $program->features = array_filter(array_map('trim', explode("\n", $request->features)));

        // Process Stats (Hardcoded 3 stats for now from form inputs)
        // Expected inputs: stat_label_0, stat_value_0, etc.
        $stats = [];
        for ($i = 0; $i < 3; $i++) {
            if ($request->input("stat_label_$i")) {
                $stats[] = [
                    'label' => $request->input("stat_label_$i"),
                    'value' => $request->input("stat_value_$i")
                ];
            }
        }
        $program->stats = $stats;

        if ($request->filled('cropped_image')) {
            $image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '_hero.png';
            \Illuminate\Support\Facades\File::put(public_path('images/') . $imageName, base64_decode($image));
            $program->image_hero = $imageName;
        } elseif ($request->hasFile('image_hero')) {
            $imageName = time().'_hero.'.$request->image_hero->extension();  
            $request->image_hero->move(public_path('images'), $imageName);
            $program->image_hero = $imageName;
        }

        $program->save();

        return redirect()->route('admin.programs.index')->with('success', 'Program updated successfully!');
    }
}
