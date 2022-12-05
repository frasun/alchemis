import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/box', {
    title: __('Content box'),
    description: __('Create box link', 'sage'),
    category: 'design',
    parent: ['alchemis/box-grid'],
    attributes: {
      title: {
        type: 'string',
      },
      subtitle: {
        type: 'string',
      },
      icon: {
        type: 'string',
      },
      type: {
        type: 'string',
      },
      url: {
        type: 'string',
      },
    },
    edit,
    save,
  });
};
