import {__} from '@wordpress/i18n';
import {RichText} from '@wordpress/block-editor';
import Icon from './icon';

export default function edit({attributes, setAttributes}) {
  return (
    <header className="flex items-center pb-1 pt-2 text-green not-prose">
      <Icon />
      <div className="ml-1">
        <RichText
          tagName="h2"
          value={attributes.content}
          onChange={(content) => setAttributes({content})}
          placeholder={__('Heading...')}
          className="m-0 mt-0.25 text-xl"
          allowedFormats={[]}
        />
        <RichText
          tagName="h3"
          value={attributes.subcontent}
          onChange={(subcontent) => setAttributes({subcontent})}
          placeholder={__('Subheading...')}
          className="pt-0.75 m-0"
          allowedFormats={[]}
        />
      </div>
    </header>
  );
}
