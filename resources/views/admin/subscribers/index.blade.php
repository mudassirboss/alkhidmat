@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>Subscribers List</h1>
    <!-- Future: Export Button -->
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Status</th>
                <th>Subscribed At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $subscriber)
            <tr>
                <td>{{ $subscriber->email }}</td>
                <td>
                    @if($subscriber->is_active)
                        <span class="badge status-verified">Active</span>
                    @else
                        <span class="badge status-canceled">Inactive</span>
                    @endif
                </td>
                <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $subscribers->links() }}
</div>
@endsection
