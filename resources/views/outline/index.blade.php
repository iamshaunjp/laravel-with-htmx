@extends('layouts.app')

@section('content')
  <div class="outline-wrapper">
    <h1 class="page-title">Outline Home</h1>

    <div class="dashboard">
      <div 
        class="col-span-3"
        hx-get="{{ route('outline.chapters.index') }}" 
        hx-trigger="load"
        hx-swap="innerHTML"
      ></div>

      <div
        class="col-span-2"
        hx-get="{{ route('outline.codex.index') }}" 
        hx-trigger="load"
        hx-swap="innerHTML"
      ></div>
    </div>

    <div id="swap"></div>

    <noscript>
      <div class="content">
        <h2 class="text-bold text-center text-4xl my-12">Start Outlining Your Novel!</h2>
        <p class="text-center my-12 max-w-1/2 mx-auto">
          JavaScript is recommended for a better experience.
        </p>
        <div class="flex justify-center my-8 gap-8 max-w-1/2 mx-auto">
          <a href="{{ route('outline.chapters.index') }}" class="btn">Chapter Timeline</a>
          <a href="{{ route('outline.codex.index') }}" class="btn">Codex Entries</a>
        </div>
      </div>
    </noscript>
    
  </div>
@endsection