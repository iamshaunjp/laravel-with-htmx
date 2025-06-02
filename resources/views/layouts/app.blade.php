<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name', 'Arcitect') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind (optional, remove if not using) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- HTMX -->
  <script src="https://unpkg.com/htmx.org@1.9.10"></script>
  
  @vite('resources/css/app.css')
  @stack('head')
</head>

<body hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'>
  <div class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="site-header">
      <nav>
        <a href="{{ url('/') }}" class="site-title">
          Arcitect
        </a>
        <a href="{{ url('/outline') }}">
          Outline Dashboard
        </a>
      </nav>
    </header>

    <!-- Main content -->
    <main>
      @yield('content') 
    </main>

    <!-- Footer -->
    <footer class="site-footer">
      &copy; {{ date('Y') }} Arcitect. All rights reserved.
    </footer>
  </div>

  @stack('scripts')
</body>
</html>