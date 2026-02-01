<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('hierarchy_level')
                             ->orderBy('order_index')
                             ->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hierarchy_level' => 'required|integer|in:1,2,3,4',
            'order_index' => 'nullable|integer',
            'social_links' => 'nullable|array',
            'is_active' => 'boolean',
            'is_in_leadership' => 'boolean',
            'show_on_team_page' => 'boolean',
            'leadership_quote' => 'nullable|string',
        ]);

        if ($request->filled('cropped_image')) {
            $image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '.png';
            
            \Illuminate\Support\Facades\File::put(public_path('images/team/') . $imageName, base64_decode($image));
            $validated['image_path'] = $imageName;
        } elseif ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/team'), $imageName);
            $validated['image_path'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_in_leadership'] = $request->has('is_in_leadership');
        $validated['show_on_team_page'] = $request->has('show_on_team_page');

        TeamMember::create($validated);

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hierarchy_level' => 'required|integer|in:1,2,3,4',
            'order_index' => 'nullable|integer',
            'social_links' => 'nullable|array',
            'is_active' => 'boolean',
            'is_in_leadership' => 'boolean',
            'show_on_team_page' => 'boolean',
            'leadership_quote' => 'nullable|string',
        ]);

        if ($request->filled('cropped_image')) {
            // Delete old image if exists
            if ($teamMember->image_path && file_exists(public_path('images/team/' . $teamMember->image_path))) {
                unlink(public_path('images/team/' . $teamMember->image_path));
            }

            $image = $request->input('cropped_image');
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '.png';
            
            \Illuminate\Support\Facades\File::put(public_path('images/team/') . $imageName, base64_decode($image));
            $validated['image_path'] = $imageName;
        } elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($teamMember->image_path && file_exists(public_path('images/team/' . $teamMember->image_path))) {
                unlink(public_path('images/team/' . $teamMember->image_path));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/team'), $imageName);
            $validated['image_path'] = $imageName;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_in_leadership'] = $request->has('is_in_leadership');
        $validated['show_on_team_page'] = $request->has('show_on_team_page');

        $teamMember->update($validated);

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image_path && file_exists(public_path('images/team/' . $teamMember->image_path))) {
            unlink(public_path('images/team/' . $teamMember->image_path));
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member deleted successfully.');
    }
}
