@extends('layouts.app')

@section('content')
  <h1 class="page-title">Codex Entry Details</h1>

  <div class="codex-details content" id="codex-details-{{ $codex->id }}">
    <h2>{{ $codex->name }}</h2>

    <div class="codex-meta">
      <p class="codex-type">{{ ucfirst($codex->type) }}</p>
    </div>

    @if ($codex->description)
      <div class="codex-description">
        {{ $codex->description }}
      </div>
    @endif

    <div class="codex-actions">
      <a href="{{ route('outline.codex.index') }}" class="btn">
        Go back to Full Codex
      </a>
      <a href="{{ route('outline.codex.edit', $codex) }}" class="btn">
        Edit Codex Entry
      </a>
      <form 
        action="{{ route('outline.codex.destroy', $codex) }}" 
        method="POST"
        class="codex-delete-form"
        onsubmit="return confirm('Are you sure you want to delete this codex entry?');"
      >
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" title="Delete Codex Entry">
          Delete Codex Entry
        </button>
      </form>
    </div>
  </div>
@endsection
