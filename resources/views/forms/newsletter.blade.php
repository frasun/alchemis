<form class="lg:w-2/3 mx-auto mt-4" spellcheck="false" novalidate>
  <fieldset class="grid sm:grid-cols-2 sm:gap-3">
    <input name="imię" type="text" class="mb-1 sm:mb-0" placeholder="{!! esc_attr_x('imię', 'sage') !!}" required>
    <input name="e-mail" type="email" placeholder="{!! esc_attr_x('e-mail', 'sage') !!}" required>
  </fieldset>

  <footer class="mt-2 text-center">
    <button class="btn relative">{{ _x('zapisz się', 'sage') }}
      <div
        class="animate-spin w-2 h-2 border-[3px] border-current border-t-transparent text-green rounded-full absolute -right-3 top-1 hidden"
        role="status" aria-label="loading">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
    <x-alert type="warning" class="form-message my-1 opacity-0">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>
  </footer>

</form>
