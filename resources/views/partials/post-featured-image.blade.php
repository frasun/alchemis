@if (has_post_thumbnail())
  <figure class="rounded-tl rounded-br overflow-hidden block my-3 h-[500px] max-h-[60vh]">
    {!! the_post_thumbnail() !!}
  </figure>
@endif
