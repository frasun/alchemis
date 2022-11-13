import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/infoboxes', {
    title: __('2 boxes'),
    description: __('Create 2 boxes with icons', 'sage'),
    category: 'widgets',
    edit,
    save,
  });
};
