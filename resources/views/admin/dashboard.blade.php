@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <div>
        <h1>Welcome back, Admin</h1>
        <p style="color: var(--text-muted); margin-top: 5px; font-size: 0.95rem;">Here's what's happening with Alkhidmat today.</p>
    </div>
    <div style="text-align: right;">
        <div style="font-weight: 700; color: var(--primary); font-size: 1.1rem;">{{ now()->format('l, d F Y') }}</div>
        <div style="font-size: 0.85rem; color: var(--accent); font-weight: 600;"><i class="fas fa-clock"></i> Live Updates Active</div>
    </div>
</div>

<style>
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    .db-card {
        background: white;
        padding: 30px;
        border-radius: 24px;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0,0,0,0.02);
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .db-card:hover { transform: translateY(-5px); }
    .db-card::after {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 100px; height: 100px;
        background: var(--primary);
        opacity: 0.03;
        border-radius: 0 0 0 100%;
    }
    .db-label { color: var(--text-muted); font-weight: 600; font-size: 0.9rem; margin-bottom: 10px; display: flex; align-items: center; gap: 8px; }
    .db-value { font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 5px; }
    .db-trend { font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; gap: 4px; }
</style>

<div class="dashboard-stats">
    <div class="db-card">
        <div class="db-label"><i class="fas fa-coins" style="color: #059669;"></i> Total Funds</div>
        <div class="db-value">PKR {{ number_format($totalDonations) }}</div>
        <div class="db-trend" style="color: #059669;"><i class="fas fa-arrow-up"></i> Live Tracking</div>
    </div>
    
    <div class="db-card">
        <div class="db-label"><i class="fas fa-hourglass-half" style="color: #d97706;"></i> Pending Review</div>
        <div class="db-value" style="color: {{ $pendingDonations > 0 ? '#d97706' : '#059669' }}">{{ $pendingDonations }}</div>
        <a href="{{ route('admin.donations.index') }}" style="color: var(--primary); text-decoration: none; font-size: 0.85rem; font-weight: 600; margin-top: 10px;">Review Donations <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i></a>
    </div>
    
    <div class="db-card">
        <div class="db-label"><i class="fas fa-exchange-alt" style="color: #2563eb;"></i> Transactions</div>
        <div class="db-value">{{ number_format($totalDonationsCount) }}</div>
        <div class="db-trend" style="color: #2563eb;">Settled Payments</div>
    </div>
    
    <div class="db-card">
        <div class="db-label"><i class="fas fa-user-friends" style="color: #7c3aed;"></i> Volunteers</div>
        <div class="db-value">{{ number_format($volunteersCount) }}</div>
        <div class="db-trend" style="color: #7c3aed;">Active Community</div>
    </div>
</div>

<div class="card-ui">
    <h3 style="margin-top:0; color: var(--primary); display: flex; align-items: center; gap: 10px;">
        <i class="fas fa-bolt" style="color: var(--accent);"></i> Quick Actions
    </h3>
    <div style="display: flex; gap:15px; flex-wrap: wrap; margin-top:20px;">
        <a href="{{ route('admin.posts.create') }}" class="btn-ui btn-primary-ui">
            <i class="fas fa-plus"></i> Post News
        </a>
        <a href="{{ route('admin.sliders.index') }}" class="btn-ui" style="background: #f1f5f9; color: #1e293b;">
            <i class="fas fa-images"></i> Update Sliders
        </a>
        <a href="{{ route('admin.settings.index') }}" class="btn-ui" style="background: #f1f5f9; color: #1e293b;">
            <i class="fas fa-tools"></i> Site Settings
        </a>
    </div>
</div>
@endsection
