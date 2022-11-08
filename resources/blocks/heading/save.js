import Icon from './icon';
import {RichText} from '@wordpress/block-editor';

export default function save({attributes}) {
  return (
    <header className="text-green flex items-center py-2">
      <Icon />
      <h2 className="ml-3 m-0 text-xl">
        <RichText.Content tagname="h2" value={attributes.content} />
      </h2>
    </header>
  );
}
