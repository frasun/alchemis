import Icon from './icon';
import {RichText} from '@wordpress/block-editor';

export default function save({attributes}) {
  return (
    <header className="text-green flex items-center pb-1 pt-2 not-prose">
      <Icon />
      <div className="ml-1">
        <h2 className="m-0 mt-0.25 text-xl">
          <RichText.Content tagname="h2" value={attributes.content} />
        </h2>
        {attributes.subcontent && (
          <h3 className="pt-0.75 m-0">
            <RichText.Content tagname="h3" value={attributes.subcontent} />
          </h3>
        )}
      </div>
    </header>
  );
}
