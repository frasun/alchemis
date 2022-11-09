import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/testimonials', {
    title: __('Testimonials'),
    description: __('Create slider with testimonials', 'sage'),
    category: 'widgets',
    attributes: {
      testimonials: {
        type: 'array',
      },
    },
    parent: ['alchemis/content-section'],
    edit,
    save,
  });
};
