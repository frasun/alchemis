import {domReady} from '@roots/sage/client';
import Menu from './menu';
import Swiper, {Navigation, Autoplay} from 'swiper';
import Form from './form';
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

  // forms
  const forms = document.querySelectorAll('form[novalidate]');
  for (let form of Array.from(forms)) {
    new Form(form);
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
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
