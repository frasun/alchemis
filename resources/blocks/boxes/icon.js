import PropTypes from 'prop-types';
import IconRelaks from './icons/icon-relaks';
import IconEnergia from './icons/icon-energia';
import IconRownowaga from './icons/icon-rownowaga';
import IconDieta from './icons/icon-dieta';

const Icon = ({name}) => {
  switch (name) {
    case 'relaks':
      return <IconRelaks />;
    case 'energia':
      return <IconEnergia />;
    case 'rownowaga':
      return <IconRownowaga />;
    case 'dieta':
      return <IconDieta />;
  }
};

Icon.propTypes = {
  name: PropTypes.oneOf(['relaks', 'energia', 'rownowaga', 'dieta']),
};

export default Icon;
