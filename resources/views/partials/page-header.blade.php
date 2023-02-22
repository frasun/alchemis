@php
  $page_title = isset($page_title) ? $page_title : $title;
  $header_image_url = isset($thumbnail_url) && !is_null($thumbnail_url) ? $thumbnail_url : (has_post_thumbnail() ? get_the_post_thumbnail_url() : '');
  $header_button_url = function_exists('get_field') ? get_field('alchemis_slider_url') : '';
  $header_has_icon = isset($prose);
  $header_theme = function_exists('get_field') ? get_field('alchemis_header_theme') : '';
  $subtitle = get_post_field('alchemis_splash_subtitle');
  
  if ($header_image_url) {
      $header_style = 'background-image: url(' . $header_image_url . ');';
  }
@endphp

<header id="pageHeader" class="{!! $header_image_url ? 'has-bg-image' : '' !!}"{!! isset($header_style) && !is_front_page() ? ' style="' . $header_style . '"' : '' !!}>
  <div class="container" {!! isset($header_style) && is_front_page() ? 'style="' . $header_style . '"' : '' !!}>
    @if ($header_has_icon)
      <div class="shrink-0 mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="59" viewBox="0 0 38 59">
          <path fill="currentColor"
            d="M38 40.008C38 50.516 28.344 59 19 59S0 50.516 0 40.008 19 12.22 19 0c-.078 12.454 19 29.5 19 40.008z">
          </path>
        </svg>
      </div>
    @endif

    <div class="header-content{!! $header_has_icon ? ' has-icon' : '' !!}{!! $header_theme ? ' text-' . $header_theme : '' !!}">
      <h1>{!! $page_title !!}</h1>

      @if ($subtitle)
        <h2 class="mt-1">{!! $subtitle !!}</h2>
      @endif

      @if ($header_button_url)
        <a href="{!! esc_url($header_button_url) !!}" class="btn btn-xl mt-2 lg:mt-3">{{ __('Kup już teraz', 'sage') }}</a>
      @endif
    </div>
  </div>
</header>
