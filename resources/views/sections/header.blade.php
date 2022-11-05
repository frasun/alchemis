<header class="sticky top-0">
  <div class="container py-1.5 lg:py-3 flex justify-between items-center">
    <a id="logo" class="-ml-1" href="{{ home_url('/') }}">
      <x-logo style="width: 155px; height: 32px" class="m-1"></x-logo>
    </a>

    @if (has_nav_menu('primary_navigation'))
      <div class="relative">
        <button id="menuToggle" class="text-dark hover:text-green p-1 -mr-1">
          @include('components.menu-toggle')
        </button>
        <nav id="menu"
          class="hidden absolute left-full -translate-x-full xl:-translate-x-1/2 xl:left-1/2 py-1.5 min-w-[250px] 2xl:min-w-[270px] text-center bg-white/80 max-h-[calc(100vh-10rem)] overflow-auto"
          aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'echo' => false]) !!}
        </nav>
      </div>
    @endif
  </div>
</header>
