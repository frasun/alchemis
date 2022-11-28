@php
  if (has_category()) {
      $post_categories = wp_get_post_categories($post->ID);
      $category_id = $post_categories[0];
  }
@endphp

<nav>
  <a href="{!! get_post_type_archive_link('post') !!}">{!! get_the_title(get_option('page_for_posts')) !!}</a>
  <span class="inline-block px-0.75 text-greyDark">></span>

  @if (has_category())
    <a href="{!! get_category_link($category_id) !!}">
      {!! get_cat_name($category_id) !!}
    </a>
    <span class="inline-block px-0.75 text-greyDark">></span>
  @endif

  <span>{!! $title !!}</span>
</nav>
