import Icon from './icon';
import {RichText} from '@wordpress/block-editor';

export default function save({attributes}) {
  return (
    <header className="text-green flex items-center py-2">
      <Icon />
      <div className="ml-3">
        <h2 className="m-0 text-xl">
          <RichText.Content tagname="h2" value={attributes.content} />
        </h2>
        {attributes.subcontent && (
          <h3 className="pt-0.75">
            <RichText.Content tagname="h3" value={attributes.subcontent} />
          </h3>
        )}
      </div>
    </header>
  );
}
