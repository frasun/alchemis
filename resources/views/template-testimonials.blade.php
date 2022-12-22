{{--
  Template Name: Testimonials
--}}
@extends('layouts.app')

@section('content')
  @php
    query_posts([
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ]);
    
    $page_id = get_queried_object_id();
    $thumbnail_url = has_post_thumbnail($page_id) ? get_the_post_thumbnail_url($page_id, 'full') : null;
  @endphp
  @include('partials.page-header', ['thumbnail_url' => $thumbnail_url, 'page_title' => get_the_title()])

  <section class="container py-5">
    <section class="prose prose-lg py-5">
      {!! apply_filters('the_content', get_post($page_id)->post_content) !!}
    </section>

    @if (!have_posts())
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
    @endif
    <section class="pb-5 grid md:grid-cols-2 gap-3">
      @while (have_posts())
        @php(the_post())
        @includeFirst(['partials.content'])
      @endwhile
    </section>

    {!! get_the_posts_navigation() !!}

    @php(wp_reset_query())
  </section>
@endsection
