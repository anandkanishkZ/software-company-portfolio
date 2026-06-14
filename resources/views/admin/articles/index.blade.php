@extends('layouts.admin')
@section('title', 'Articles')
@section('page-title', 'Articles')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div style="font-size:.875rem;color:var(--s500);">{{ $articles->count() }} article{{ $articles->count() !== 1 ? 's' : '' }}</div>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm px-3 py-2" style="border-radius:8px;font-size:.875rem;">
        <i class="bi bi-plus-lg me-1"></i>New Article
    </a>
</div>

<div class="data-card">
    @if($articles->isNotEmpty())
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th style="width:60px;"></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $a)
                <tr>
                    <td>
                        @if($a->image)
                        <img src="{{ asset('storage/'.$a->image) }}" style="width:48px;height:36px;object-fit:cover;border-radius:6px;" alt="">
                        @else
                        <div style="width:48px;height:36px;background:var(--s100);border-radius:6px;display:flex;align-items:center;justify-content:center;color:var(--blue);opacity:.5;">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        @endif
                    </td>
                    <td style="max-width:320px;">
                        <div style="font-weight:600;font-size:.875rem;color:var(--s900);">{{ $a->title }}</div>
                        <div style="font-size:.775rem;color:var(--s400);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:320px;">{{ $a->excerpt }}</div>
                    </td>
                    <td style="font-size:.825rem;">{{ $a->author }}</td>
                    <td>
                        @if($a->published_at)
                        <span class="badge-read">Published</span>
                        @else
                        <span style="background:#FEF9C3;color:#854D0E;font-size:.7rem;font-weight:700;padding:.2rem .6rem;border-radius:6px;border:1px solid #FDE68A;">Draft</span>
                        @endif
                    </td>
                    <td style="font-size:.775rem;color:var(--s400);">
                        {{ $a->published_at ? $a->published_at->format('d M Y') : '—' }}
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            @if($a->published_at)
                            <a href="{{ route('articles.show', $a) }}" target="_blank" class="btn-icon" title="View">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                            @endif
                            <a href="{{ route('admin.articles.edit', $a) }}" class="btn-icon" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.articles.destroy', $a) }}" onsubmit="return confirm('Delete this article? This cannot be undone.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon" title="Delete" style="color:#EF4444;border-color:#FECACA;" onmouseover="this.style.background='#FEF2F2'" onmouseout="this.style.background=''">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-5" style="color:var(--s400);">
        <i class="bi bi-newspaper" style="font-size:2.5rem;opacity:.2;display:block;margin-bottom:.75rem;"></i>
        <div style="font-weight:600;">No articles yet</div>
        <div style="font-size:.875rem;margin:.25rem 0 1rem;">Write your first article to publish it on the website.</div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm px-4">Write First Article</a>
    </div>
    @endif
</div>

@endsection
