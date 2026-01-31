@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Programs Manager</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Stats Count</th>
                <th>Features Count</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->title }}</td>
                <td>{{ is_array($program->stats) ? count($program->stats) : 0 }} Stats</td>
                <td>{{ is_array($program->features) ? count($program->features) : 0 }} Features</td>
                <td>{{ $program->updated_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn-sm" style="background:#3498db;">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
