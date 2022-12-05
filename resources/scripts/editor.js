import {domReady} from '@roots/sage/client';

import registerHeadingBlock from '../blocks/heading';
import registerSectionBlock from '../blocks/section';
import registerTestimonialsBlock from '../blocks/testimonials';
import registerStatsBlock from '../blocks/stats';
import registerIconGridBlock from '../blocks/icon-grid';
import registerBoxBlock from '../blocks/box';
import registerBoxGridBlock from '../blocks/box-grid';

function registerBlocks() {
  registerHeadingBlock();
  registerSectionBlock();
  registerTestimonialsBlock();
  registerStatsBlock();
  registerIconGridBlock();
  registerBoxGridBlock();
  registerBoxBlock();
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
