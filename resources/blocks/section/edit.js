import {
  InnerBlocks,
  useBlockProps,
  InspectorControls,
  MediaUpload,
  MediaUploadCheck,
} from '@wordpress/block-editor';
import {PanelBody, PanelRow, Button} from '@wordpress/components';
import {__} from '@wordpress/i18n';

const ALLOWED_BLOCKS = [
  'alchemis/heading-with-icon',
  'core/heading',
  'core/paragraph',
  'core/image',
  'alchemis/testimonials',
  'core/latest-posts',
  'core/columns',
  'core/list',
  'woocommerce/featured-product',
  'woocommerce/product-new',
];
const ALLOWED_MEDIA_TYPES = ['image'];

export default function edit({className, setAttributes, attributes}) {
  const blockProps = useBlockProps();
  const styles = attributes.backgroundImage
    ? {backgroundImage: `url(${attributes.backgroundImage})`}
    : undefined;

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Background image')} initialOpen={true}>
          <PanelRow>
            {attributes.backgroundImage ? (
              <>
                <figure>
                  <img src={attributes.backgroundImage} />

                  <aside className="mt-1">
                    <MediaUploadCheck>
                      <MediaUpload
                        onSelect={({url}) => {
                          setAttributes({backgroundImage: url});
                        }}
                        allowedTypes={ALLOWED_MEDIA_TYPES}
                        render={({open}) => (
                          <Button
                            variant="secondary"
                            className="mr-1"
                            onClick={open}>
                            {__('Replace')}
                          </Button>
                        )}
                      />
                    </MediaUploadCheck>
                    <Button
                      variant="link"
                      isDestructive={true}
                      onClick={() =>
                        setAttributes({backgroundImage: undefined})
                      }>
                      {__('Reset')}
                    </Button>
                  </aside>
                </figure>
              </>
            ) : (
              <MediaUploadCheck>
                <MediaUpload
                  onSelect={({url}) => {
                    setAttributes({backgroundImage: url});
                  }}
                  allowedTypes={ALLOWED_MEDIA_TYPES}
                  render={({open}) => (
                    <Button variant="primary" onClick={open}>
                      {__('Select media')}
                    </Button>
                  )}
                />
              </MediaUploadCheck>
            )}
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <section {...blockProps} className={className} style={styles}>
        <div className="container py-6">
          <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
        </div>
      </section>
    </>
  );
}
