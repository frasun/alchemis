@php
  if ($thumbnail_url) {
      $header_style = 'background-image: url(' . $thumbnail_url . ');';
  } else {
      if (has_post_thumbnail()) {
          $header_style = 'background-image: url(' . get_the_post_thumbnail_url() . ');';
      }
  }
  
  if ($header_style) {
      $header_style .= ' background-size: cover;';
  }
  
  $header_classes = 'mt-[-6rem] lg:mt-[-7rem] pt-[6rem] lg:pt-[7rem]';
  $header_inner_padding = 'pt-6 pb-4';
  
  if ($header_style) {
      if (is_front_page()) {
          $header_classes .= ' h-[100vh] max-h-[86rem] bg-header-mobile md:bg-homepage';
          $header_inner_padding = 'pt-8 pb-8 md:pb-13';
      } else {
          $header_classes .= ' h-[90vh] max-h-[55rem] bg-header-mobile md:bg-right';
          $header_inner_padding = 'py-8';
      }
  }
  
  $page_title = $page_title ? $page_title : $title;
@endphp

<header class="{!! $header_classes !!}"{!! $header_style ? ' style="' . $header_style : '' !!}">
  @if ($header_style)
    <div class="container h-full flex {!! $header_inner_padding !!}">
      <h1 class="md:w-1/2 self-end">{!! $page_title !!}</h1>
    </div>
  @else
    <div class="container">
      <h1 class="{!! $header_inner_padding !!} border-t border-grey-3 text-xlg">{!! $page_title !!}</h1>
    </div>
  @endif
</header>
