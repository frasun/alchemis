<footer id="footer"
  class="bg-dark text-white leading-tight pt-7 pb-10 bg-footer bg-no-repeat bg-bottom bg-[length:750px]">
  <div class="container">
    <x-logo type="light" class="mb-2"></x-logo>

    @if (is_active_sidebar('sidebar-footer-1') ||
        is_active_sidebar('sidebar-footer-2') ||
        is_active_sidebar('sidebar-footer-3') ||
        is_active_sidebar('sidebar-footer-4'))
      @php
        $cols = 0;
        if (is_active_sidebar('sidebar-footer-1')) {
            ++$cols;
        }
        
        if (is_active_sidebar('sidebar-footer-2')) {
            ++$cols;
        }
        
        if (is_active_sidebar('sidebar-footer-3')) {
            ++$cols;
        }
        
        if (is_active_sidebar('sidebar-footer-4')) {
            ++$cols;
        }
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        @if (is_active_sidebar('sidebar-footer-1'))
          @php(dynamic_sidebar('sidebar-footer-1'))
        @endif

        @if (is_active_sidebar('sidebar-footer-2'))
          @php(dynamic_sidebar('sidebar-footer-2'))
        @endif

        @if (is_active_sidebar('sidebar-footer-3'))
          @php(dynamic_sidebar('sidebar-footer-3'))
        @endif

        @if (is_active_sidebar('sidebar-footer-4'))
          @php(dynamic_sidebar('sidebar-footer-4'))
        @endif
      </div>
    @endif
</footer>
