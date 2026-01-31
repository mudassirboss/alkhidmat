@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Dashboard</h1>
    <div class="date-display">{{ now()->format('l, d F Y') }}</div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <span class="stat-label">Total Donations Raised</span>
        <span class="stat-value">PKR {{ number_format($totalDonations) }}</span>
        <span class="status-badge status-verified" style="width: fit-content;">Updated just now</span>
    </div>
    
    <div class="stat-card">
        <span class="stat-label">Pending Verifications</span>
        <span class="stat-value" style="color: {{ $pendingDonations > 0 ? '#e67e22' : '#27ae60' }}">{{ $pendingDonations }}</span>
        <a href="#" class="btn-sm" style="margin-top: auto; text-align: center;">View Pending</a>
    </div>
    
    <div class="stat-card">
        <span class="stat-label">Total Transactions</span>
        <span class="stat-value">{{ number_format($totalDonationsCount) }}</span>
    </div>
    
    <div class="stat-card">
        <span class="stat-label">Volunteers Registered</span>
        <span class="stat-value">{{ number_format($volunteersCount) }}</span>
        <span class="stat-label" style="font-size: 0.8rem;">Ready to serve</span>
    </div>
</div>

<div class="table-card">
    <h3>Recent Activities</h3>
    <p style="color: #888; margin-top: 10px;">Implementation of detailed activity log coming soon.</p>
</div>
@endsection
