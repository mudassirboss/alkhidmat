@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0 text-gray-800">Team Members</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Team Member
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Team Members</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>
                                @if($member->image_path)
                                    <img src="{{ asset('images/team/' . $member->image_path) }}" alt="{{ $member->name }}" width="50" class="img-thumbnail rounded-circle">
                                @else
                                    <span class="badge badge-secondary">No Image</span>
                                @endif
                            </td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->role }}</td>
                            <td>
                                @if($member->hierarchy_level == 1) <span class="badge badge-primary">President</span>
                                @elseif($member->hierarchy_level == 2) <span class="badge badge-info">Vice President</span>
                                @elseif($member->hierarchy_level == 3) <span class="badge badge-success">Director</span>
                                @elseif($member->hierarchy_level == 4) <span class="badge badge-warning">Lead</span>
                                @endif
                            </td>
                            <td>
                                {!! $member->is_active ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}
                            </td>
                            <td>
                                <a href="{{ route('admin.team-members.edit', $member->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                                </form>
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
