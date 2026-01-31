@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Programs Manager</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #c3e6cb;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="card-ui">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Program Title</th>
                    <th>Statistics</th>
                    <th>Features</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                <tr>
                    <td style="font-weight:600; color: var(--primary);">{{ $program->title }}</td>
                    <td>
                        <span style="background:#e0f2fe; color:#0369a1; padding:4px 10px; border-radius:15px; font-size:0.8rem; font-weight:600;">
                            <i class="fas fa-chart-pie"></i> {{ is_array($program->stats) ? count($program->stats) : 0 }} Stats
                        </span>
                    </td>
                    <td>
                        <span style="background:#f0fdf4; color:#166534; padding:4px 10px; border-radius:15px; font-size:0.8rem; font-weight:600;">
                            <i class="fas fa-list-check"></i> {{ is_array($program->features) ? count($program->features) : 0 }} Features
                        </span>
                    </td>
                    <td style="color: var(--text-muted); font-size: 0.9rem;">
                        <i class="far fa-clock"></i> {{ $program->updated_at->format('M d, Y') }}
                    </td>
                    <td>
                        <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn-ui" style="background:#3498db; color:white; padding: 8px 15px; font-size: 0.85rem;">
                            <i class="fas fa-edit"></i> Edit Content
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
