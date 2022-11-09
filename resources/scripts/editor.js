import {domReady} from '@roots/sage/client';

import registerHeadingBlock from '../blocks/heading';
import registerSectionBlock from '../blocks/section';
import registerTestimonialsBlock from '../blocks/testimonials';

function registerBlocks() {
  registerHeadingBlock();
  registerSectionBlock();
  registerTestimonialsBlock();
}

const main = (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // unregisterBlockStyle('core/button', 'outline');

  registerBlocks();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
