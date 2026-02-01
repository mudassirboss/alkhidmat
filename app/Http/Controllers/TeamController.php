<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamController extends Controller
{
    public function index()
    {
        // Fetch active members ordered by level and index
        $members = TeamMember::where('is_active', true)
                             ->where('show_on_team_page', true) // Only show if enabled for team page
                             ->orderBy('hierarchy_level')
                             ->orderBy('order_index')
                             ->get();

        // Organize into hierarchy groups
        $team = [
            'president' => $members->where('hierarchy_level', 1)->first(),
            'vice_presidents' => $members->where('hierarchy_level', 2),
            'directors' => $members->where('hierarchy_level', 3),
            'leads' => $members->where('hierarchy_level', 4),
        ];

        return view('team.index', compact('team'));
    }
}
