@extends('layouts.app')

@section('content')
  @php
    $page_id = get_queried_object_id();
    $thumbnail_url = has_post_thumbnail($page_id) ? get_the_post_thumbnail_url($page_id, 'full') : null;
    
    if (is_category()) {
        $page_title = get_cat_name($page_id);
    } elseif (is_archive()) {
        $page_title = get_post_type_object(get_post_type())->labels->name;
    } else {
        $page_title = get_the_title(get_option('page_for_posts'));
    }
  @endphp
  @include('partials.page-header', ['thumbnail_url' => $thumbnail_url, 'page_title' => $page_title])

  <section class="container py-5">
    @if (is_category())
      @if (category_description())
        <section class="prose pb-5">
          {!! category_description() !!}
        </section>
      @endif
    @else
      <section class="prose py-5">
        {!! apply_filters('the_content', get_post($page_id)->post_content) !!}
      </section>
    @endif

    @if (!have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
    @else
      <section class="pb-5 grid md:grid-cols-2 gap-3">
        @while (have_posts())
          @php(the_post())
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        @endwhile
      </section>
    @endif

    {!! get_the_posts_navigation() !!}
  </section>
@endsection

@section('aside')
  @include('partials.newsletter')
@endsection
