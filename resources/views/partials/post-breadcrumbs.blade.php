@php
  if (has_category()) {
      $post_categories = wp_get_post_categories($post->ID);
      $category_id = $post_categories[0];
  }
@endphp

<nav>
  <a href="{!! get_post_type_archive_link(get_post_type()) !!}">
    @if (get_post_type() == 'post')
      {!! get_the_title(get_option('page_for_posts')) !!}
    @else
      {!! get_post_type_object(get_post_type())->labels->name !!}
    @endif
  </a>
  <span class="inline-block px-0.75 text-greyDark">></span>

  @if (has_category())
    <a href="{!! get_category_link($category_id) !!}">
      {!! get_cat_name($category_id) !!}
    </a>
    <span class="inline-block px-0.75 text-greyDark">></span>
  @endif

  <span>{!! $title !!}</span>
</nav>
