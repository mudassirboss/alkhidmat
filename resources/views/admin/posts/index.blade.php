@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>News & Stories</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn-sm" style="background:#27ae60; cursor:pointer;">+ Add New Story</a>
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
                <th>Category</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                   <div style="font-weight:600;">{{ $post->title }}</div>
                   <div style="font-size:0.8rem; color:#888;">/news/{{ $post->slug }}</div>
                </td>
                <td><span class="status-badge" style="background:#eee; color:#333;">{{ $post->category }}</span></td>
                <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'Draft' }}</td>
                <td>
                    <div style="display:flex; gap:5px;">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn-sm" style="background:#3498db;">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this story?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm" style="background:#e74c3c; border:none; cursor:pointer;">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 20px;">
        {{ $posts->links() }}
    </div>
</div>
@endsection
