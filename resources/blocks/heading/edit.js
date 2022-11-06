import {__} from '@wordpress/i18n';
import {RichText} from '@wordpress/block-editor';
import Icon from './icon';

export default function edit({attributes, setAttributes}) {
  return (
    <header className="flex items-center pb-2 pt-5 text-green">
      <Icon />
      <RichText
        tagName="h2"
        value={attributes.content}
        onChange={(content) => setAttributes({content})}
        placeholder={__('Heading...')}
        className="ml-3 text-xl"
        allowedFormats={[]}
      />
    </header>
  );
}
