import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';
import edit from './edit';
import save from './save';

export default () => {
  registerBlockType('alchemis/box-grid', {
    title: __('Box grid'),
    description: __('Create box grid', 'sage'),
    category: 'widgets',
    edit,
    save,
  });
};
