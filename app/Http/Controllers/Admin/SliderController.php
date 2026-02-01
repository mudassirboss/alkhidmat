<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order_index', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // New validation
            'title' => 'required|string',
            'layout' => 'required|string',
        ]);

        $imageName = null;
        if ($request->filled('cropped_image')) {
            $image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '_main.png';
            \Illuminate\Support\Facades\File::put(public_path('images/sliders/') . $imageName, base64_decode($image));
        } elseif ($request->hasFile('image')) {
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/sliders'), $imageName);
        }

        $backgroundImageName = null;
        if ($request->hasFile('background_image')) {
            $backgroundImageName = time() . '_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('images/sliders'), $backgroundImageName);
        }
            
        Slider::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'secondary_button_text' => $request->secondary_button_text,
            'secondary_button_link' => $request->secondary_button_link,
            'image_path' => $imageName,
            'background_image_path' => $backgroundImageName,
            'layout' => $request->layout,
            'order_index' => Slider::count() + 1
        ]);

        return redirect()->back()->with('success', 'Slide created successfully!');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'title' => 'required|string',
            'layout' => 'required|string',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'secondary_button_text' => $request->secondary_button_text,
            'secondary_button_link' => $request->secondary_button_link,
            'layout' => $request->layout,
            'is_active' => $request->has('is_active')
        ];

        if ($request->filled('cropped_image')) {
            // Delete old image
            if ($slider->image_path && file_exists(public_path('images/sliders/' . $slider->image_path))) {
                @unlink(public_path('images/sliders/' . $slider->image_path));
            }
            $image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '_main.png';
            \Illuminate\Support\Facades\File::put(public_path('images/sliders/') . $imageName, base64_decode($image));
            $data['image_path'] = $imageName;
        } elseif ($request->hasFile('image')) {
            // Delete old image
            if ($slider->image_path && file_exists(public_path('images/sliders/' . $slider->image_path))) {
                @unlink(public_path('images/sliders/' . $slider->image_path));
            }
            $imageName = time() . '_main.' . $request->image->extension();
            $request->image->move(public_path('images/sliders'), $imageName);
            $data['image_path'] = $imageName;
        }

        if ($request->hasFile('background_image')) {
            // Delete old background
            if ($slider->background_image_path && file_exists(public_path('images/sliders/' . $slider->background_image_path))) {
                @unlink(public_path('images/sliders/' . $slider->background_image_path));
            }
            $bgName = time() . '_bg.' . $request->background_image->extension();
            $request->background_image->move(public_path('images/sliders'), $bgName);
            $data['background_image_path'] = $bgName;
        }

        $slider->update($data);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide updated successfully!');
    }

    public function destroy(Slider $slider)
    {
        $path = public_path('images/sliders/' . $slider->image_path);
        if (file_exists($path)) {
            @unlink($path);
        }
        $slider->delete();
        return redirect()->back()->with('success', 'Slide deleted.');
    }
    
    public function updateOrder(Request $request)
    {
        // Future implementation for drag and drop
    }
}
