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

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 pt-1">
        @if (is_active_sidebar('sidebar-footer-1'))
          <div>
            @php(dynamic_sidebar('sidebar-footer-1'))
          </div>
        @endif

        @if (is_active_sidebar('sidebar-footer-2'))
          <div>
            @php(dynamic_sidebar('sidebar-footer-2'))
          </div>
        @endif

        @if (is_active_sidebar('sidebar-footer-3'))
          <div>
            @php(dynamic_sidebar('sidebar-footer-3'))
          </div>
        @endif

        @if (is_active_sidebar('sidebar-footer-4'))
          <div>
            @php(dynamic_sidebar('sidebar-footer-4'))
          </div>
        @endif
      </div>
    @endif
</footer>
