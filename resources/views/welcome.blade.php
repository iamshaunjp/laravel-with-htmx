@extends('layouts.app')

@section('content')
  <h1 class="page-title">Welcome to Arctitect</h1>

  <div class="welcome content">
    <h2 class="font-display text-5xl text-center my-12">Welcome</h2>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Earum suscipit praesentium nostrum perspiciatis molestias possimus soluta doloribus delectus modi, dolore accusantium magni. Corrupti voluptatem rem iure porro aliquid cum. Rerum ut nostrum dolores voluptates unde harum ducimus quo error, aliquid laudantium quos neque quis provident exercitationem beatae molestias asperiores? Pariatur!</p>
    <div class="flex justify-center my-8 gap-8 max-w-1/2 mx-auto">
      <a href="{{ url('/outline') }}" class="btn">Start Outlining Your Novel</a>
    </div>
  </div>
@endsection