<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

<main>
  @yield('content')
</main>

@hasSection('sidebar')
  <aside>
    @yield('sidebar')

    @include('partials.newsletter')
  </aside>
@endif

@include('sections.footer')
