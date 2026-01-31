@extends('layouts.admin')

@section('content')
<div class="header-bar">
    <h1>News & Stories</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn-ui btn-primary-ui">
        <i class="fas fa-plus"></i> Add New Story
    </a>
</div>

@if(session('success'))
<div style="background:#d4edda; color:#155724; padding:15px; border-radius:12px; margin-bottom:25px; border:1px solid #c3e6cb;">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

<div class="card-ui">
    <div class="table-responsive">
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
                       <div style="font-weight:600; color: var(--primary);">{{ $post->title }}</div>
                       <div style="font-size:0.8rem; color: var(--text-muted);">/news/{{ $post->slug }}</div>
                    </td>
                    <td>
                        <span style="background:#f1f5f9; color:#475569; padding:5px 12px; border-radius:20px; font-size:0.8rem; font-weight:600; border:1px solid #e2e8f0;">
                            {{ $post->category }}
                        </span>
                    </td>
                    <td>
                        <div style="color: var(--text-muted); font-size: 0.9rem;">
                            <i class="far fa-calendar-alt"></i> 
                            {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('M d, Y') : 'Draft' }}
                        </div>
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn-ui" style="background:#3498db; color:white; padding: 8px 12px; font-size: 0.85rem;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Delete this story?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-ui" style="background:#ff5252; color:white; padding: 8px 12px; font-size: 0.85rem; border:none;">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if($posts->hasPages())
    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #edf2f7;">
        {{ $posts->links() }}
    </div>
    @endif
</div>
@endsection
