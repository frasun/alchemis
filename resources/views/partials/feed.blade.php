@if (is_active_sidebar('sidebar-feed'))
  <section class="container pt-5 pb-7">
    @php(dynamic_sidebar('sidebar-feed'))
  </section>
@endif
