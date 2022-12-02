@extends('layouts.app')

@section('content')
  @php
    $widgets = function_exists('get_field') && is_array(get_field('alchemis_sidebebar_options')) ? get_field('alchemis_sidebebar_options') : [];
  @endphp

  @while (have_posts())
    @php(the_post())
    @include('partials.page-header')

    @if (isset($inside_container))
      <section class="container pt-2 pb-7">
        <div class="prose{{ isset($prose) ? ' prose-lg' : '' }}">
          @includeFirst(['partials.content-page', 'partials.content'])
        </div>
      </section>
    @else
      @includeFirst(['partials.content-page', 'partials.content'])
    @endif
  @endwhile
@endsection

@section('sidebar')
  @if (in_array('primary_sidebar', $widgets))
    @include('sections.sidebar')
  @endif
@endsection

@section('aside')
  @if (in_array('newsletter_sidebar', $widgets))
    @include('partials.newsletter')
  @endif
@endsection
