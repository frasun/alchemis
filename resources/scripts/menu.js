export default class Menu {
  constructor() {
    this.menuToggle = document.getElementById('menuToggle');
    this.menu = document.getElementById('menu');
    this.logo = document.getElementById('logo');
    this.isOpen = false;
  }

  toggleMenu() {
    this.menu.classList.toggle('hidden');
    this.menuToggle.classList.toggle('text-green');
    this.isOpen = !this.isOpen;
  }

  handleOutsideClick(event) {
    if (event.target.closest('#menu')) return;

    this.toggleMenu();
    document.removeEventListener('click', this.handleOutsideClick);
  }

  handleScroll() {
    requestAnimationFrame(() => {
      if (window.scrollY > 0) {
        this.menuToggle.classList.add('bg-white');
        this.logo.classList.add('bg-white');
      } else {
        this.menuToggle.classList.remove('bg-white');
        this.logo.classList.remove('bg-white');
      }
    });
  }

  init() {
    this.menuToggle.addEventListener('click', (event) => {
      event.stopPropagation();
      this.toggleMenu();

      if (this.isOpen) {
        document.addEventListener('click', this.handleOutsideClick.bind(this));
      }
    });

    window.addEventListener('scroll', this.handleScroll.bind(this));
  }
}
