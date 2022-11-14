import data from './data';

const Infoboxes = () => (
  <section className="container infobox-section">
    <div className="md:w-[650px] mx-auto grid md:grid-cols-2 gap-3">
      {data?.map(({title, subtitle}, index) => (
        <div className="infobox" key={index}>
          <div className="infobox-inner"></div>
          <h3 className="infobox-title">{title}</h3>
          <h4 className="infobox-subtitle">{subtitle}</h4>
        </div>
      ))}
    </div>
  </section>
);

export default Infoboxes;
