@extends('layouts.app')

@section('content')
  <h1 class="page-title">Edit Codex Entry</h1>

  <div class="codex-edit-form content" id="codex-edit-{{ $codex->id }}">
    <form method="POST" action="{{ route('outline.codex.update', $codex) }}">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="form-input"
          value="{{ old('name', $codex->name) }}" 
          required
        >

        @error('name')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="type" class="form-label">Type</label>
        <select id="type" name="type" class="form-select" required>
          <option value="character" @selected(old('type', $codex->type) == 'character')>Character</option>
          <option value="item" @selected(old('type', $codex->type) == 'item')>Item</option>
          <option value="location" @selected(old('type', $codex->type) == 'location')>Location</option>
        </select>

        @error('type')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea
          id="description"
          name="description"
        >{{ old('description', $codex->description) }}</textarea>

        @error('description')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="form-save">
          Save Changes to Entry
        </button>
      </div>
    </form>
  </div>
@endsection
