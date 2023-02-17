<header id="header" class="sticky top-0 z-50 bg-white">
  <div class="container py-0.75 lg:py-1 xl:py-2 grid grid-cols-7 items-center">
    @if (has_nav_menu('primary_navigation'))
      <div class="col-span-2 lg:col-span-3">
        @include('components.menu')
      </div>
    @endif

    <a id="logo" href="{{ home_url('/') }}" class="col-span-3 lg:col-span-1 flex justify-center">
      <x-logo style="width: 165px; height: auto"></x-logo>
    </a>

    @if (class_exists('woocommerce'))
      <aside class="col-span-2 lg:col-span-3 flex justify-end items-center gap-0.5 sm:gap-1">
        @include('components.cart-icon')
        @include('components.profile-icon')
      </aside>
    @endif
  </div>
</header>
