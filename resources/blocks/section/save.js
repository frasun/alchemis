import {InnerBlocks, useBlockProps} from '@wordpress/block-editor';

export default function save({attributes, className}) {
  const blockProps = useBlockProps.save();
  const styles = attributes.backgroundImage
    ? {backgroundImage: `url(${attributes.backgroundImage})`}
    : undefined;

  return (
    <section {...blockProps} className={className} style={styles}>
      <div className="container py-6">
        <InnerBlocks.Content />
      </div>
    </section>
  );
}
