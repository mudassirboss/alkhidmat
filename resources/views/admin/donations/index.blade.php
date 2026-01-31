@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Donation Manager</h1>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="background:#f8d7da; color:#721c24; padding:15px; border-radius:8px; margin-bottom:20px;">
    {{ session('error') }}
</div>
@endif

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Method / Receipt</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donation)
            <tr>
                <td>{{ $donation->id }}</td>
                <td>
                    <strong>{{ $donation->name }}</strong><br>
                    <small>{{ $donation->email }}</small>
                </td>
                <td>PKR {{ number_format($donation->amount) }}</td>
                </td>
                <td>
                    <span class="status-badge status-{{ $donation->status == 'completed' ? 'verified' : ($donation->status == 'pending' ? 'pending' : 'failed') }}">
                        {{ ucfirst($donation->status) }}
                    </span>
                </td>
                <td>{{ $donation->created_at->format('M d, Y') }}</td>
                <td>
                    @if($donation->status == 'pending')
                    <div style="display:flex; gap:5px;">
                        <a href="{{ route('admin.donations.verify', $donation->id) }}" class="btn-sm" style="background:#27ae60;">Verify</a>
                        <a href="{{ route('admin.donations.reject', $donation->id) }}" class="btn-sm" style="background:#e74c3c;">Reject</a>
                    </div>
                    @else
                    <span style="color:#aaa;">No actions</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $donations->links() }}
    </div>
</div>
@endsection
