import {useSelect} from '@wordpress/data';
import {store} from '@wordpress/core-data';
import {useBlockProps} from '@wordpress/block-editor';
import Slider from './view';

export default function edit({setAttributes}) {
  const blockProps = useBlockProps({
    className: 'swiper',
  });

  const testimonials = useSelect(
    (select) => select(store).getEntityRecords('postType', 'testimonial'),
    [],
  );

  setAttributes({testimonials});

  return <Slider testimonials={testimonials} {...blockProps} />;
}
