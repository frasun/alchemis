import {registerBlockVariation} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';

export default () => {
  registerBlockVariation('core/columns', {
    name: 'alchemis/icon-grid',
    title: __('Icon grid'),
    icon: 'admin-site-alt3',
    scope: ['inserter'],
    isDefault: true,
    attributes: {
      className: 'icon-grid',
    },
    innerBlocks: [
      [
        'core/column',
        {},
        [
          ['core/image'],
          ['core/heading', {level: 3, placeholder: 'Lorem ipsum'}],
        ],
      ],
      [
        'core/column',
        {},
        [
          ['core/image'],
          ['core/heading', {level: 3, placeholder: 'Lorem ipsum'}],
        ],
      ],
      [
        'core/column',
        {},
        [
          ['core/image'],
          ['core/heading', {level: 3, placeholder: 'Lorem ipsum'}],
        ],
      ],
    ],
  });
};
