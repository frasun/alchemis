@if (is_active_sidebar('sidebar-modal'))
  <div id="modalBackdrop"></div>
  <div id="modal">
    <div id="modalContent" class="bg-white rounded-tl rounded-br px-4">
      <a id="modalClose" class="absolute top-0 right-0 cursor-pointer flex flex-col items-center p-2 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path
            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
            fill="currentColor">
          </path>
        </svg>
      </a>
      @php(dynamic_sidebar('sidebar-modal'))
    </div>
  </div>
@endif
