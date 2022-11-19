<header id="header" class="sticky top-0 z-50">
  <div class="container py-1 lg:py-2 flex justify-between items-center">
    <a id="logo" class="grow" href="{{ home_url('/') }}">
      <x-logo style="width: 155px; height: 32px"></x-logo>
    </a>

    @if (class_exists('woocommerce'))
      @include('components.cart-icon')
    @endif

    @if (has_nav_menu('primary_navigation'))
      @include('components.menu')
    @endif
  </div>
</header>
