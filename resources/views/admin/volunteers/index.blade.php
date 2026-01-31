@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1><i class="fas fa-users-cog"></i> Volunteer Manager</h1>
</div>

<div class="card-ui">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Ref ID</th>
                    <th>Name & Info</th>
                    <th>Contact Details</th>
                    <th>Location</th>
                    <th>Blood Group</th>
                    <th>Interests</th>
                    <th>Registered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($volunteers as $volunteer)
                <tr>
                    <td style="color: var(--text-muted); font-weight: 500;">#{{ str_pad($volunteer->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>
                        <div style="font-weight:700; color: var(--primary);">{{ $volunteer->name }}</div>
                        <div style="font-size:0.75rem; text-transform: uppercase; color: var(--accent); font-weight: 600;">Active Volunteer</div>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <i class="fas fa-envelope" style="color: #64748b; font-size: 0.85rem;"></i>
                            <span style="font-size: 0.9rem;">{{ $volunteer->email }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-phone" style="color: #64748b; font-size: 0.85rem;"></i>
                            <span style="font-size: 0.9rem; font-weight: 500;">{{ $volunteer->mobile_no }}</span>
                        </div>
                    </td>
                    <td>
                        <span style="background:#f1f5f9; color:#475569; padding:4px 10px; border-radius:15px; font-size:0.8rem; font-weight:600;">
                            <i class="fas fa-map-marker-alt"></i> {{ $volunteer->district ?? 'N/A' }}
                        </span>
                    </td>
                    <td>
                        @if($volunteer->blood_group)
                            <span style="background:#fee2e2; color:#b91c1c; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.8rem; border: 1px solid #fecaca;">
                                {{ $volunteer->blood_group }}
                            </span>
                        @else
                            <span style="color: #cbd5e1;">-</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-size: 0.85rem; color: var(--text-main); line-height: 1.4;">
                            {{ $volunteer->area_of_interest }}
                        </div>
                    </td>
                    <td style="color: var(--text-muted); font-size: 0.85rem;">
                        {{ $volunteer->created_at->format('M d, Y') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($volunteers->hasPages())
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #edf2f7;">
        {{ $volunteers->links() }}
    </div>
    @endif
</div>
@endsection
