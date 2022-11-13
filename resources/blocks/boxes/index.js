import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/boxes', {
    title: __('4 boxes'),
    description: __('Create 4 boxes with icons', 'sage'),
    category: 'widgets',
    edit,
    save,
  });
};
