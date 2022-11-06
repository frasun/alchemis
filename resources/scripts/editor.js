import {domReady} from '@roots/sage/client';
// import {registerBlockStyle, unregisterBlockStyle} from '@wordpress/blocks';

import registerHeadingBlock from '../blocks/heading';

/**
 * editor.main
 */
const main = (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }

  // unregisterBlockStyle('core/button', 'outline');

  // registerBlockStyle('core/button', {
  //   name: 'outline',
  //   label: 'Outline',
  // });

  registerHeadingBlock();
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
