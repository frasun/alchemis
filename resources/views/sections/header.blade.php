@php
  $header_theme = function_exists('get_field') ? get_field('alchemis_header_theme') : '';
@endphp

<header id="header" class="sticky top-0 z-50" data-theme="{!! $header_theme !!}">
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
