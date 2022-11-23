<article @php(post_class('container pb-5'))>
  <header class="pt-3 pb-4 border-t border-grey-3">
    @include('partials.post-breadcrumbs')
    @include('partials.post-featured-image')

    <div class="text-green flex pt-4">
      <div class="shrink-0 mr-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="59" viewBox="0 0 38 59">
          <path fill="currentColor"
            d="M38 40.008C38 50.516 28.344 59 19 59S0 50.516 0 40.008 19 12.22 19 0c-.078 12.454 19 29.5 19 40.008z">
          </path>
        </svg>
      </div>
      <h1 class="pt-0.75 text-xl">{!! $title !!}</h1>
    </div>

    {{-- @include('partials.entry-meta') --}}
  </header>

  <div class="prose">
    @php(the_content())
  </div>

  <footer>
    {!! wp_link_pages([
        'echo' => 0,
        'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
        'after' => '</p></nav>',
    ]) !!}
  </footer>

  @php(comments_template())
</article>
