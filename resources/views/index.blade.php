@extends('layouts.app')

@section('content')
  @php
    $page_id = get_queried_object_id();
    if (has_post_thumbnail($page_id)) {
        $thumbnail_url = get_the_post_thumbnail_url($page_id, 'full');
    }
    
    if (is_archive()) {
        $page_title = get_post_type_object(get_post_type())->labels->name;
    }
  @endphp
  @include('partials.page-header', ['thumbnail_url' => $thumbnail_url, 'page_title' => $page_title])

  <section class="container py-5">
    {!! apply_filters('the_content', get_post($page_id)->post_content) !!}
  </section>

  @if (!have_posts())
    <section class="container">
      <x-alert type="warning">
        {!! __('Sorry, no results were found.', 'sage') !!}
      </x-alert>
    </section>
  @endif

  <section class="container pb-5 grid md:grid-cols-2 gap-3">
    @while (have_posts())
      @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endwhile
  </section>

  {!! get_the_posts_navigation() !!}
@endsection

@section('aside')
  @include('partials.newsletter')
@endsection
