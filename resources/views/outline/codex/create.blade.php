@extends('layouts.app')

@section('content')
  <h1 class="page-title">Create New Codex Entry</h1>

  <div class="codex-create-form content">
    <form method="POST" action="{{ route('outline.codex.store') }}">
      @csrf

      <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input 
          type="text" 
          id="name" 
          name="name" 
          class="form-input"
          value="{{ old('name') }}" 
          required
        >
        @error('name')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="type" class="form-label">Type</label>
        <select id="type" name="type" class="form-select" required>
          <option value="character">Character</option>
          <option value="item">Item</option>
          <option value="location">Location</option>
        </select>
        @error('type')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" name="description"></textarea>
        
        @error('description')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit" class="form-save">
          Create Entry
        </button>
      </div>
    </form>
  </div>
@endsection
