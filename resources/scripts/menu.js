export default class Menu {
  constructor() {
    this.menuToggle = document.getElementById('menuToggle');
    this.menu = document.getElementById('menu');
    this.header = document.getElementById('header');
    this.logo = document.getElementById('logo');
    this.isOpen = false;

    this.handleOutsideClick = this.handleOutsideClick.bind(this);
  }

  toggleMenu() {
    this.menu.classList.toggle('hidden');
    this.menuToggle.classList.toggle('open');
    this.isOpen = !this.isOpen;

    if (this.isOpen) {
      document.addEventListener('click', this.handleOutsideClick, true);
    } else {
      document.removeEventListener('click', this.handleOutsideClick, true);
    }
  }

  handleOutsideClick(event) {
    event.stopPropagation();

    if (event.target.closest('#menu')) return;

    this.toggleMenu();
  }

  handleScroll() {
    window.requestAnimationFrame(() => {
      if (window.scrollY > 0) {
        this.header.classList.add('scrolled');
      } else {
        this.header.classList.remove('scrolled');
      }
    });
  }

  init() {
    this.menuToggle.addEventListener('click', this.toggleMenu.bind(this));
    window.addEventListener('scroll', this.handleScroll.bind(this));
  }
}
