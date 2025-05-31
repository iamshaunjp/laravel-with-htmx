@extends('layouts.app')

@section('content')
  <h1 class="page-title">Chapters Timeline</h1>

  @fragment('chapter-list')
  <div class="chapter-list content" id="chapter-list">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-xl ml-2 font-bold">Chapters</h2>
      <a href="{{ route('outline.chapters.create') }}" class="btn inline-block mb-4"
        @if($isHtmx)
          hx-get="{{ route('outline.chapters.create') }}"
          hx-target="#modal"
          hx-swap="innerHTML"
        @endif
      >
        Add a New Chapter
      </a>
    </div>

      @forelse ($chapters as $chapter)

      <div class="chapter" id="chapter-{{ $chapter->id }}">
        <div class="chapter-header">
          <h2>Chapter {{ $chapter->order }}</h2>
          <a 
            href="{{ route('outline.chapters.show', $chapter) }}" 
            class="chapter-title"
            @if($isHtmx)
              hx-get="{{ route('outline.chapters.show', $chapter) }}"
              hx-target="#modal"
              hx-swap="innerHTML"
            @endif
          >{{ $chapter->title }}
          </a>
        </div>
        <div class="chapter-description">
          {{ Str::words($chapter->description, 10, '...') }}
        </div>
      </div>

    @empty
      <p class="empty">No chapters yet. Add your first one to get started!</p>
    @endforelse
  </div>
  @endfragment
@endsection