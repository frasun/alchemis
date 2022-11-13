import data from './data';
import Icon from './icon';

const Boxes = () => (
  <section className="container py-6">
    <div className="md:w-[650px] mx-auto grid md:grid-cols-2 gap-3">
      {data?.map(({title, subtitle, icon}, index) => (
        <div className="box" key={index}>
          <div className={`box-inner box-icon-${icon}`}>
            <Icon name={icon} />
            <div className="box-title">
              <h3 className="text-xlg text-center">{title}</h3>
            </div>
            <div className="box-subtitle">
              <h4 className="text-lg text-center leading-tight">{subtitle}</h4>
            </div>
          </div>
        </div>
      ))}
    </div>
  </section>
);

export default Boxes;
