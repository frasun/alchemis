import PropTypes from 'prop-types';
import {decodeEntities} from '@wordpress/html-entities';

const Slider = ({testimonials, ...props}) => {
  return (
    <div {...props}>
      <div className="swiper-wrapper">
        {testimonials?.map(({id, title, content}) => (
          <figure
            key={id}
            className="swiper-slide text-greyDark flex flex-col px-5">
            <blockquote
              className="order-2"
              dangerouslySetInnerHTML={{
                __html: content?.rendered,
              }}></blockquote>
            <figcaption className="order-1 bg-white self-center py-1 px-5 rounded-tl-full rounded-br-full mb-1">
              {decodeEntities(title.rendered)}
            </figcaption>
          </figure>
        ))}
      </div>
      <div className="swiper-button-prev">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="22"
          viewBox="0 0 16 22">
          <path
            d="M11,0,22,16H0Z"
            transform="translate(0 22) rotate(-90)"
            fill="currentColor"
          />
        </svg>
      </div>
      <div className="swiper-button-next">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="22"
          viewBox="0 0 16 22">
          <path
            d="M11,0,22,16H0Z"
            transform="translate(16) rotate(90)"
            fill="currentColor"
          />
        </svg>
      </div>
    </div>
  );
};

Slider.propTypes = {
  testimonials: PropTypes.array,
};

export default Slider;
