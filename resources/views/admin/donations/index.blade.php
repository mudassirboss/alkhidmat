@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1><i class="fas fa-hand-holding-heart"></i> Donation Manager</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #c3e6cb;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="background:#fdeaea; color:#9b1c1c; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #fbd5d5;">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

<div class="card-ui">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Ref ID</th>
                    <th>Donor Details</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donations as $donation)
                <tr>
                    <td style="color: var(--text-muted); font-weight: 500;">#{{ str_pad($donation->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>
                        <div style="font-weight:700; color: var(--primary);">{{ $donation->name }}</div>
                        <div style="font-size:0.8rem; color: var(--text-muted);">{{ $donation->email }}</div>
                    </td>
                    <td style="font-weight: 700; color: #166534;">PKR {{ number_format($donation->amount) }}</td>
                    <td>
                        <span style="background:#f1f5f9; color:#475569; padding:4px 10px; border-radius:15px; font-size:0.75rem; font-weight:600; text-transform: uppercase;">
                             {{ $donation->method ?? 'Bank' }}
                        </span>
                    </td>
                    <td style="color: var(--text-muted); font-size: 0.9rem;">
                        <i class="far fa-calendar-alt"></i> {{ $donation->created_at->format('M d, Y') }}
                    </td>
                    <td>
                        @php
                            $statusColors = [
                                'completed' => ['bg' => '#dcfce7', 'text' => '#166534'],
                                'pending'   => ['bg' => '#fef9c3', 'text' => '#854d0e'],
                                'failed'    => ['bg' => '#fee2e2', 'text' => '#991b1b'],
                            ];
                            $colors = $statusColors[$donation->status] ?? ['bg' => '#f1f5f9', 'text' => '#475569'];
                        @endphp
                        <span style="background: {{ $colors['bg'] }}; color: {{ $colors['text'] }}; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; display: inline-flex; align-items: center; gap: 5px;">
                            <i class="fas fa-{{ $donation->status == 'completed' ? 'check-circle' : ($donation->status == 'pending' ? 'clock' : 'times-circle') }}"></i>
                            {{ ucfirst($donation->status) }}
                        </span>
                    </td>
                    <td>
                        @if($donation->status == 'pending')
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.donations.verify', $donation->id) }}" class="btn-ui" style="background:#22c55e; color:white; padding: 6px 12px; font-size: 0.8rem;">
                                <i class="fas fa-check"></i> Verify
                            </a>
                            <a href="{{ route('admin.donations.reject', $donation->id) }}" class="btn-ui" style="background:#ef4444; color:white; padding: 6px 12px; font-size: 0.8rem;">
                                <i class="fas fa-times"></i> Reject
                            </a>
                        </div>
                        @else
                        <span style="color: var(--text-muted); font-size: 0.85rem; font-style: italic;">No Action Required</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($donations->hasPages())
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #edf2f7;">
        {{ $donations->links() }}
    </div>
    @endif
</div>
@endsection
