<header class="sticky top-0">
  <div class="container py-1 lg:py-2 flex justify-between items-center">
    <a id="logo" class="-ml-1" href="{{ home_url('/') }}">
      <x-logo style="width: 155px; height: 32px" class="m-1"></x-logo>
    </a>

    @if (has_nav_menu('primary_navigation'))
      @include('components.menu')
    @endif
  </div>
</header>
