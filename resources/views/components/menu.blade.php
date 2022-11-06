<aside class="relative">
  <button id="menuToggle" class="text-dark hover:text-green p-1">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20">
      <path d="M4.5,29h28V25.667H4.5Zm0-8.333h28V17.333H4.5ZM4.5,9v3.333h28V9Z" transform="translate(-4.5 -9)"
        fill="currentColor" />
    </svg>
  </button>
  <nav id="menu"
    class="hidden absolute left-full -translate-x-full xl:-translate-x-1/2 xl:left-1/2 py-1.5 min-w-[250px] lg:max-xl:min-w-[200px] xl:min-w-[220px] text-center bg-white/80 max-h-[calc(100vh-10rem)] overflow-auto"
    aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'echo' => false]) !!}
  </nav>
</aside>
