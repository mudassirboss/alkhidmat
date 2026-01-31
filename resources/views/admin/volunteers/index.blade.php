@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Volunteer Manager</h1>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>District</th>
                <th>Blood Group</th>
                <th>Interests</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($volunteers as $volunteer)
            <tr>
                <td>#{{ $volunteer->id }}</td>
                <td>
                    <div style="font-weight:600;">{{ $volunteer->name }}</div>
                </td>
                <td>
                    <div>{{ $volunteer->email }}</div>
                    <div style="font-size:0.85rem; color:#888;">{{ $volunteer->mobile_no }}</div>
                </td>
                <td>{{ $volunteer->district ?? '-' }}</td>
                <td>{{ $volunteer->blood_group ?? '-' }}</td>
                <td>{{ $volunteer->area_of_interest }}</td>
                <td>{{ $volunteer->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $volunteers->links() }}
    </div>
</div>
@endsection
