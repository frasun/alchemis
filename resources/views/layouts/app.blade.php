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
  </aside>
@endif

@hasSection('aside')
  @yield('aside')
@endif

@include('sections.footer')

<div class="maz maz-left">
  @if (is_front_page())
    <div class="bg-maz1"></div>
  @endif
  <div class="bg-maz4"></div>
  <div class="bg-maz6"></div>
</div>
<div class="maz maz-right">
  <div class="bg-maz2"></div>
  <div class="bg-maz3"></div>
  <div class="bg-maz5"></div>
</div>
