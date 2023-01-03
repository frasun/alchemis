import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/heading-with-icon', {
    title: __('Heading with icon'),
    description: __('Create heading with icon', 'sage'),
    category: 'text',
    icon: 'heading',
    attributes: {
      content: {
        type: 'string',
        source: 'html',
        selector: 'h2',
      },
      subcontent: {
        type: 'string',
        source: 'html',
        selector: 'h3',
      },
    },
    example: {
      attributes: {
        content: __('Example content', 'sage'),
      },
    },
    edit,
    save,
  });
};
