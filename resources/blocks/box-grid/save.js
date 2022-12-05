import {InnerBlocks, useBlockProps} from '@wordpress/block-editor';

export default function save({className}) {
  const blockProps = useBlockProps.save({
    className: 'container',
  });

  return (
    <section {...blockProps} className={className}>
      <div className="md:w-[650px] mx-auto grid md:grid-cols-2 gap-3">
        <InnerBlocks.Content />
      </div>
    </section>
  );
}
