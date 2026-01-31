<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        // Settings are already shared globally, but let's fetch them to be safe/explicit if needed for form
        // Or just rely on global $settings variable in view? 
        // Better to explicitly pass entries for form iteration if dynamic, 
        // but for static form, global key access is fine.
        return view('admin.settings.index');
    }

    public function update(Request $request)
    {
        // Loop through all input fields
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
