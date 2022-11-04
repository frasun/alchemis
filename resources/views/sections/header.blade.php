<header class="container py-3">
  <a class="brand" href="{{ home_url('/') }}">
    <x-logo style="width: 155px; height: 32px"></x-logo>
  </a>

  @if (has_nav_menu('primary_navigation'))
    <button id="menuToggle">menu</button>
    <nav id="menu" class="hidden" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'echo' => false]) !!}
    </nav>
  @endif
</header>
