// import {__} from '@wordpress/i18n';
import Icon from './icon';
import {RichText} from '@wordpress/block-editor';

export default function save({attributes}) {
  return (
    <header className="text-green flex items-center pb-2 pt-5">
      <Icon />
      <h2 className="ml-3 text-xl">
        <RichText.Content tagname="h2" value={attributes.content} />
      </h2>
    </header>
  )
}
