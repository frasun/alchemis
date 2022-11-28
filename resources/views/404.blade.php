@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section class="container pb-5">
      <x-alert type="warning">
        {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
      </x-alert>
    </section>
  @endif
@endsection
