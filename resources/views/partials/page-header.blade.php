@php
  $style = has_post_thumbnail() ? 'background-image: url(' . get_the_post_thumbnail_url() . '); background-size: cover;' : '';
@endphp

<header class="mt-[-6rem] lg:mt-[-7rem] pt-[6rem] lg:pt-[7rem] h-[55rem] max-h-[90vh] bg-header-mobile md:bg-right"
  style="{!! $style !!}">
  <div class="container py-8 h-full flex">
    <h1 class="md:w-1/2 self-end">{!! $title !!}</h1>
  </div>
</header>
