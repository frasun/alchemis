import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/content-section', {
    title: __('Content section'),
    description: __('Create section of content', 'sage'),
    category: 'design',
    icon: 'cover-image',
    attributes: {
      backgroundImage: {
        type: 'string',
      },
    },
    edit,
    save,
    styles: [
      {
        name: 'dark',
        label: __('Dark'),
      },
    ],
  });
};
