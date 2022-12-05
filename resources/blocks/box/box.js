import PropTypes from 'prop-types';
// import Icon from '../boxes/icon';
export const TYPES = {
  ICON: 'icon',
  INFO: 'info',
};

const Box = ({title, subtitle, type, url, icon}) => {
  return (
    <>
      {url ? (
        <a href={url}>
          <BoxComponent
            title={title}
            subtitle={subtitle}
            type={type}
            icon={icon}
          />
        </a>
      ) : (
        <BoxComponent
          title={title}
          subtitle={subtitle}
          type={type}
          icon={icon}
        />
      )}
    </>
  );
};

const BoxComponent = ({title, subtitle, type, icon}) => (
  <div className="box" data-type={type}>
    {type === TYPES.ICON ? (
      <div className={`box-inner box-icon`}>
        {icon && <img src={icon} />}
        <h3 className="box-title">{title}</h3>
        <h4 className="box-subtitle">{subtitle}</h4>
      </div>
    ) : (
      <>
        <div className="box-inner"></div>
        <h3 className="box-title">{title}</h3>
        <h4 className="box-subtitle">{subtitle}</h4>
      </>
    )}
  </div>
);

BoxComponent.propTypes = {
  title: PropTypes.string,
  subtitle: PropTypes.string,
  icon: PropTypes.string,
  type: PropTypes.oneOf([TYPES.ICON, TYPES.INFO]),
};

BoxComponent.defaultProps = {
  title: 'box',
  subtitle: 'description',
  type: TYPES.INFO,
};

Box.propTypes = {
  ...BoxComponent.propTypes,
  link: PropTypes.object,
};

Box.defaultProps = BoxComponent.defaultProps;

export default Box;
