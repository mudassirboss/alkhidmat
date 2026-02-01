@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="header-bar mb-4 d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0 text-gray-800" style="font-family: 'Outfit', sans-serif; font-weight: 700;">Programs Manager</h1>
    </div>

    @if(session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
        <div class="card-header bg-white py-3 d-flex flex-row align-items-center justify-content-between" style="border-bottom: 1px solid #f0f0f0; border-radius: 12px 12px 0 0;">
            <h6 class="m-0 font-weight-bold text-primary">All Programs</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="width: 100%;" cellspacing="0">
                    <thead class="bg-light">
                        <tr>
                            <th class="py-3 pl-4 border-0" style="font-weight: 600; color: #4b5563;">Program Title</th>
                            <th class="py-3 border-0" style="font-weight: 600; color: #4b5563;">Statistics</th>
                            <th class="py-3 border-0" style="font-weight: 600; color: #4b5563;">Features</th>
                            <th class="py-3 border-0" style="font-weight: 600; color: #4b5563;">Last Updated</th>
                            <th class="py-3 pr-4 border-0 text-right" style="font-weight: 600; color: #4b5563;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                        <tr style="border-bottom: 1px solid #f3f4f6;">
                            <td class="py-3 pl-4">
                                <span class="d-block font-weight-bold text-dark">{{ $program->title }}</span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-light text-primary border border-primary-subtle rounded-pill px-3 py-2" style="font-weight: 600;">
                                    <i class="fas fa-chart-pie mr-1"></i> {{ is_array($program->stats) ? count($program->stats) : 0 }} Stats
                                </span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-light text-success border border-success-subtle rounded-pill px-3 py-2" style="font-weight: 600;">
                                    <i class="fas fa-list-check mr-1"></i> {{ is_array($program->features) ? count($program->features) : 0 }} Features
                                </span>
                            </td>
                            <td class="py-3 text-muted" style="font-size: 0.9rem;">
                                <i class="far fa-clock mr-1"></i> {{ $program->updated_at->format('M d, Y') }}
                            </td>
                            <td class="py-3 pr-4 text-right">
                                <a href="{{ route('admin.programs.edit', $program->id) }}" class="btn btn-sm btn-outline-primary shadow-sm" style="border-radius: 6px;">
                                    <i class="fas fa-edit mr-1"></i> Edit Content
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
