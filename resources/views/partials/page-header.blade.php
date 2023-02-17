@php
  if (isset($thumbnail_url) && !is_null($thumbnail_url)) {
      $header_style = 'background-image: url(' . $thumbnail_url . ');';
  } else {
      if (has_post_thumbnail()) {
          $header_style = 'background-image: url(' . get_the_post_thumbnail_url() . ');';
      }
  }
  
  $header_classes = '';
  
  if (isset($header_style)) {
      $header_style .= ' background-size: cover;';
  }
  
  $header_inner_padding = 'pt-6 pb-4';
  
  if (isset($header_style)) {
      $header_classes .= 'pt-[6rem] lg:pt-[7rem]';
  
      if (is_front_page()) {
          $header_classes .= ' h-[80vh] max-h-[64rem]';
          $header_inner_padding = 'pb-3 sm:pb-6';
      } else {
          $header_classes .= ' h-[70vh] max-h-[42rem] bg-header-mobile md:bg-right';
          $header_inner_padding = 'pb-4 lg:pb-6';
      }
  }
  
  $header_theme = function_exists('get_field') ? get_field('alchemis_header_theme') : '';
  
  if ($header_theme === 'white') {
      $header_classes .= ' text-white';
  }
  
  $header_url = function_exists('get_field') ? get_field('alchemis_slider_url') : '';
  
  $page_title = isset($page_title) ? $page_title : $title;
@endphp

<header id="pageHeader" class="{!! $header_classes !!}"{!! isset($header_style) ? ' style="' . $header_style . '"' : '' !!}>
  @if (isset($header_style))
    <div class="container h-full flex {!! $header_inner_padding !!}">
      <div class="sm:w-1/2 self-end{!! is_front_page() ? ' lg:self-center bg-white sm:bg-transparent p-1 sm:p-0' : '' !!}">
        <h1 class="break-words">{!! $page_title !!}</h1>
        @if ($header_url)
          <a href="{!! esc_url($header_url) !!}" class="btn btn-xl mt-2 lg:mt-3">{{ __('Kup już teraz', 'sage') }}</a>
        @endif
      </div>
    </div>
  @elseif (isset($prose))
    <div class="container pb-4">
      <div class="text-green flex pt-4">
        <div class="shrink-0 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="38" height="59" viewBox="0 0 38 59">
            <path fill="currentColor"
              d="M38 40.008C38 50.516 28.344 59 19 59S0 50.516 0 40.008 19 12.22 19 0c-.078 12.454 19 29.5 19 40.008z">
            </path>
          </svg>
        </div>
        <div>
          <h1 class="pt-0.75 text-xl break-words">
            {!! $page_title !!}
          </h1>
        </div>
      </div>
    </div>
  @else
    <div class="container">
      <h1 class="{!! $header_inner_padding !!} border-t border-grey-3 text-xlg">{!! $page_title !!}</h1>
    </div>
  @endif
</header>
