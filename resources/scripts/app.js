import {domReady} from '@roots/sage/client';
import Menu from './menu';
import Swiper, {Navigation, Autoplay} from 'swiper';
import CartUpdate from './cart';

const UPDATE_CART_BTN = 'update_cart';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // application code
  // menu
  const menu = new Menu();
  menu.init();

  // testimonials slider
  const TESTIMONIALS_SLIDER = '.wp-block-alchemis-testimonials';
  const testimonialsSwiper = document.querySelector(TESTIMONIALS_SLIDER);
  const testimonialsCount =
    testimonialsSwiper && testimonialsSwiper.getAttribute('data-post-count');

  if (parseInt(testimonialsCount) > 1) {
    // eslint-disable-next-line no-unused-vars
    const testimonials = new Swiper(TESTIMONIALS_SLIDER, {
      modules: [Navigation, Autoplay],
      loop: true,
      autoplay: {
        delay: 5000,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }

  // cart
  const cartUpdateBtn = document.querySelector(`[name=${UPDATE_CART_BTN}]`);
  if (cartUpdateBtn) {
    new CartUpdate(cartUpdateBtn);
  }

  // checkout quantity
  const changeQuantity = document.querySelectorAll('.changeQuantity');

  for (let input of Array.from(changeQuantity)) {
    input.addEventListener('click', (e) => {
      e.preventDefault();

      const add = input.getAttribute('data-add');
      const qtyInputId = input.getAttribute('data-input-id');
      const qtyInput = document.getElementById(qtyInputId);

      if (qtyInput) {
        let newValue = Number(qtyInput.value);

        if (add === 'true') {
          newValue += 1;
        } else if (newValue > 1) {
          newValue -= 1;
        }

        qtyInput.value = newValue;
      }
    });
  }

  // modal
  const MODAL_SHOW_TIME = 5000;
  const MODAL_TOUCHED = 'touched';
  const MODAL_OPEN = 'open';
  const MODAL_COOKIE_EXP = 30;

  function getCookie(cname) {
    let name = cname + '=';
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return '';
  }

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    let expires = 'expires=' + d.toUTCString();
    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
  }

  let visited = getCookie('newsletter_modal_shown');

  if (visited === '') {
    window.setTimeout(() => {
      const modal = document.getElementById('modal');
      const modalBackdrop = document.getElementById('modalBackdrop');
      const modalClose = document.getElementById('modalClose');

      if (modalBackdrop) {
        modalBackdrop.classList.add(MODAL_TOUCHED);
        modalBackdrop.classList.add(MODAL_OPEN);
      }

      if (modal) {
        modal.classList.add(MODAL_TOUCHED);
        modal.classList.add(MODAL_OPEN);
      }

      if (modalClose) {
        modalClose.addEventListener('click', () => {
          modal.classList.remove(MODAL_OPEN);
          modalBackdrop.classList.remove(MODAL_OPEN);

          modalBackdrop.addEventListener('transitionend', () => {
            modal.classList.remove(MODAL_TOUCHED);
            modalBackdrop.classList.remove(MODAL_TOUCHED);
          });

          setCookie('newsletter_modal_shown', true, MODAL_COOKIE_EXP);
        });
      }
    }, MODAL_SHOW_TIME);
  }
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
