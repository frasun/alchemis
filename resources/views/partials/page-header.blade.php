@php
  $header_style = has_post_thumbnail() ? 'background-image: url(' . get_the_post_thumbnail_url() . '); background-size: cover;' : '';
  $header_classes = 'mt-[-6rem] lg:mt-[-7rem] pt-[6rem] lg:pt-[7rem]';
  $header_inner_padding = 'py-4';
  
  if (has_post_thumbnail()) {
      if (is_front_page()) {
          $header_classes .= ' h-[100vh] max-h-[86rem] bg-header-mobile md:bg-homepage';
          $header_inner_padding = 'pt-8 pb-8 md:pb-13';
      } else {
          $header_classes .= ' h-[90vh] max-h-[55rem] bg-header-mobile md:bg-right';
          $header_inner_padding = 'py-8';
      }
  }
@endphp

<header class="{!! $header_classes !!}" style="{!! $header_style !!}">
  <div class="container h-full flex {!! $header_inner_padding !!}">
    <h1 class="md:w-1/2 self-end">{!! $title !!}</h1>
  </div>
</header>
