@extends('layouts.app')

@section('content')
  <h1 class="page-title">Edit Chapter</h1>

  @fragment('chapter-edit-form')
  <div class="chapter-edit-form content">
    <form 
      method="POST" 
      action="{{ route('outline.chapters.update', $chapter) }}"
      class="edit-form"
      @if($isHtmx)
        hx-put="{{ route('outline.chapters.update', $chapter) }}"
        hx-target=".chapter-list"
        hx-swap="outerHTML"
      @endif
    >
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="title">Chapter Title</label>
        <input 
          type="text" 
          id="title" 
          name="title" 
          class="form-input"
          value="{{ old('title', $chapter->title) }}" 
          required
        >

        @error('title')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <textarea 
          id="description" 
          name="description"
        >{{old('description', $chapter->description)}}</textarea>

        @error('description')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit">Save Edits</button>
      </div>
    </form>
  </div>
  @endfragment
@endsection
