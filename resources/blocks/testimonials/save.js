import {useBlockProps} from '@wordpress/block-editor';
import Slider from './view';

export default function save({attributes}) {
  const blockProps = useBlockProps.save({
    className: 'swiper',
  });

  return <Slider testimonials={attributes.testimonials} {...blockProps} />;
}
