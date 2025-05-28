@extends('layouts.app')

@section('content')
  <h1 class="page-title">Codex</h1>

  @fragment('codex-list')
  <div class="codex-list content" id="codex-list">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-xl ml-2 font-bold">Codex Entries</h2>
      <a href="{{ route('outline.codex.create') }}" class="btn inline-block">
        Add a New Codex Entry
      </a>
    </div>

    @php
      $types = ['character', 'item', 'location'];
    @endphp

    @foreach ($types as $type)
      @if(isset($codexEntries[$type]) && $codexEntries[$type]->count())
        <div class="codex-group codex-group-{{ $type }}">
          <h2>{{ ucfirst($type) }}s</h2>
          <ul>
            @foreach ($codexEntries[$type] as $entry)
              <li class="codex-entry" id="codex-entry-{{ $entry->id }}">
                <a href="{{ route('outline.codex.show', $entry) }}">
                  {{ $entry->name }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      @endif
    @endforeach

    @if ($codexEntries->isEmpty())
      <p class="empty">No codex entries yet. Add your first character, item, or location!</p>
    @endif
  </div>
  @endfragment
@endsection
