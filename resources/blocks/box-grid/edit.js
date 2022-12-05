import {InnerBlocks, useBlockProps} from '@wordpress/block-editor';

const ALLOWED_BLOCKS = ['alchemis/box'];

export default function edit({className}) {
  const blockProps = useBlockProps({
    className: 'container',
  });

  return (
    <section {...blockProps} className={className}>
      <div className="md:w-[650px] mx-auto grid md:grid-cols-2 gap-3">
        <InnerBlocks orientation="horizontal" allowedBlocks={ALLOWED_BLOCKS} />
      </div>
    </section>
  );
}
