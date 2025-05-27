@extends('layouts.app')

@section('content')
  <h1 class="page-title">Chapter Details</h1>

  <div class="chapter-details content">
    <h2>Chapter {{ $chapter->order }}</h2>
    <h3 class="chapter-title">{{ $chapter->title }}</h3>
    <div class="chapter-description">
      {{ $chapter->description }}
    </div>
    <div class="chapter-meta">
      <span class="chapter-updated">
        Last edited: {{ $chapter->updated_at->format('F j, Y \a\t g:i a') }}
      </span>
    </div>
    <div class="chapter-actions">
      <a href="{{ route('outline.chapters.index') }}" class="btn">
        Go back to full chapter timeline
      </a>
      <a href="{{ route('outline.chapters.edit', $chapter) }}" class="btn">
        Edit Chapter
      </a>
      <form 
        action="{{ route('outline.chapters.destroy', $chapter) }}" 
        method="POST"
        class="chapter-delete-form"
        onsubmit="return confirm('Are you sure you want to delete this chapter?');"
      >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" title="Delete Chapter">
          Delete Chapter
        </button>
      </form>
    </div>
  </div>

@endsection
