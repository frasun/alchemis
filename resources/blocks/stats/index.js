import {registerBlockVariation} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';

export default () => {
  registerBlockVariation('core/columns', {
    name: 'alchemis/stats',
    title: __('Stats'),
    icon: 'analytics',
    scope: ['inserter'],
    isDefault: true,
    attributes: {
      className: 'stats',
    },
    innerBlocks: [
      [
        'core/column',
        {},
        [
          ['core/heading', {level: 3, placeholder: '100%'}],
          ['core/paragraph', {placeholder: 'Lorem ipsum dolor'}],
        ],
      ],
      [
        'core/column',
        {},
        [
          ['core/heading', {level: 3, placeholder: '100%'}],
          ['core/paragraph', {placeholder: 'Lorem ipsum dolor'}],
        ],
      ],
      [
        'core/column',
        {},
        [
          ['core/heading', {level: 3, placeholder: '100%'}],
          ['core/paragraph', {placeholder: 'Lorem ipsum dolor'}],
        ],
      ],
    ],
  });
};
