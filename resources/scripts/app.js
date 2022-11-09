import {domReady} from '@roots/sage/client';
import Menu from './menu';
import Swiper, {Navigation, Autoplay} from 'swiper';

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
  // eslint-disable-next-line no-unused-vars
  const testimonials = new Swiper('.wp-block-alchemis-testimonials', {
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
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
