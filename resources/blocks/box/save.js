import {useBlockProps} from '@wordpress/block-editor';
import Box from './box';

export default function save({attributes}) {
  const blockProps = useBlockProps.save();
  const {title, subtitle, type, url, icon} = attributes;

  return (
    <Box
      title={title}
      subtitle={subtitle}
      type={type}
      url={url}
      icon={icon}
      {...blockProps}
    />
  );
}
