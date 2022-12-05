import {
  PanelBody,
  PanelRow,
  TextareaControl,
  TextControl,
  SelectControl,
  Button,
} from '@wordpress/components';
import {
  useBlockProps,
  __experimentalLinkControl as LinkControl,
  MediaUpload,
  MediaUploadCheck,
  InspectorControls,
} from '@wordpress/block-editor';
import {__} from '@wordpress/i18n';
import Box, {TYPES} from './box';

export default function edit({attributes, setAttributes}) {
  const blockProps = useBlockProps();
  const {title, subtitle, type, url, icon} = attributes;

  return (
    <>
      <InspectorControls>
        <PanelBody title={__('Content')} initialOpen={true}>
          <PanelRow>
            <SelectControl
              label={__('Type')}
              onChange={(type) => setAttributes({type})}
              options={[
                {
                  label: TYPES.INFO,
                  value: TYPES.INFO,
                },
                {
                  label: TYPES.ICON,
                  value: TYPES.ICON,
                },
              ]}
            />
          </PanelRow>
          <PanelRow>
            <TextControl
              label={__('Title')}
              value={title}
              onChange={(title) => setAttributes({title})}
            />
          </PanelRow>
          <PanelRow>
            <TextareaControl
              label={__('Subtitle')}
              value={subtitle}
              onChange={(subtitle) => setAttributes({subtitle})}
            />
          </PanelRow>
          {type === TYPES.ICON ? (
            <PanelRow>
              {icon ? (
                <>
                  <figure>
                    <img src={icon} />

                    <aside className="mt-1">
                      <MediaUploadCheck>
                        <MediaUpload
                          onSelect={({url}) => {
                            setAttributes({icon: url});
                          }}
                          allowedTypes={['image']}
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
                        onClick={() => setAttributes({icon: undefined})}>
                        {__('Reset')}
                      </Button>
                    </aside>
                  </figure>
                </>
              ) : (
                <MediaUploadCheck>
                  <MediaUpload
                    onSelect={({url}) => {
                      setAttributes({icon: url});
                    }}
                    allowedTypes={['image']}
                    render={({open}) => (
                      <Button variant="primary" onClick={open}>
                        {__('Select media')}
                      </Button>
                    )}
                  />
                </MediaUploadCheck>
              )}
            </PanelRow>
          ) : (
            ''
          )}
        </PanelBody>
        <PanelBody title={__('Link')} className="alchemis-box-url">
          <LinkControl
            value={{url}}
            onChange={({url}) => setAttributes({url})}
            onRemove={() => setAttributes({url: undefined})}
            settings={[]}
          />
        </PanelBody>
      </InspectorControls>
      <Box
        title={title}
        subtitle={subtitle}
        type={type}
        url={url}
        icon={icon}
        {...blockProps}
      />
    </>
  );
}
