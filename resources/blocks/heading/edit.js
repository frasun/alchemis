import {__} from '@wordpress/i18n';
import {RichText} from '@wordpress/block-editor';
import Icon from './icon';

export default function edit({attributes, setAttributes}) {
  return (
    <header className="flex items-center py-2 text-green">
      <Icon />
      <div className="ml-3">
        <RichText
          tagName="h2"
          value={attributes.content}
          onChange={(content) => setAttributes({content})}
          placeholder={__('Heading...')}
          className="m-0 text-xl"
          allowedFormats={[]}
        />
        <RichText
          tagName="h3"
          value={attributes.subcontent}
          onChange={(subcontent) => setAttributes({subcontent})}
          placeholder={__('Subheading...')}
          className="pt-0.75"
          allowedFormats={[]}
        />
      </div>
    </header>
  );
}
