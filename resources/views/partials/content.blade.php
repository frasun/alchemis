<a href="{{ get_permalink() }}"
  @php(post_class('link'))>
    @if (has_post_thumbnail())
      <figure>
        {{ the_post_thumbnail('thumbnail') }}
      </figure>
    @endif
  <h2 class="text-lg py-2 px-3">{!! $title !!}</h2>
</a>
