<footer class="bg-dark text-white leading-tight pt-7 pb-9 bg-footer bg-no-repeat bg-bottom bg-[length:750px]">
  <div class="container">
    <x-logo type="light" class="mb-2"></x-logo>
    @if (is_active_sidebar('sidebar-footer') || has_nav_menu('primary_navigation'))
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        @php(dynamic_sidebar('sidebar-footer'))

        @if (has_nav_menu('primary_navigation'))
          <nav id="footerMenu" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
            {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'echo' => false]) !!}
          </nav>
        @endif
      </div>
    @endif
</footer>
