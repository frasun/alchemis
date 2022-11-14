import resolveConfig from 'tailwindcss/resolveConfig';
import tailwindConfig from '../../tailwind.config.cjs';

const twConfig = resolveConfig(tailwindConfig);

const EMAIL = 'email';
const REQUIRED = 'required';
const TYPE = 'type';
const TRANSITION_DURATION = parseInt(
  twConfig.theme.transitionDuration['DEFAULT'],
);
const ERROR = 'error';
const SUCCESS = 'success';

export default class Form {
  constructor(form) {
    this.form = form;
    this.inputs = Array.from(this.form.querySelectorAll('input'));
    this.messageBox = this.form.querySelector('.form-message');
    this.spinner = this.form.querySelector('[role="status"]');

    this.init();
  }

  handleSubmit(event) {
    event.preventDefault();

    this.messageBox.classList.add('opacity-0');

    const requiredOk = this.validateRequired();

    if (requiredOk !== true) {
      this.displayMessage(this.message(REQUIRED, requiredOk.name));
      return;
    }

    const typeOk = this.validateInputType();

    if (typeOk !== true) {
      this.displayMessage(this.message(TYPE, typeOk.name));
      return;
    }

    if (this.spinner) {
      this.spinner.classList.remove('hidden');
    }

    window.setTimeout(() => {
      this.displayMessage(this.message(SUCCESS), SUCCESS);
    }, 600);
  }

  validateRequired() {
    for (let input of this.inputs) {
      if (input.hasAttribute('required') && input.value.length < 1) {
        return input;
      }
    }

    return true;
  }

  validateInputType() {
    for (let input of this.inputs) {
      if (!this.validate(input)) {
        return input;
      }
    }

    return true;
  }

  validate(input) {
    const {type, value} = input;
    const mailRegExp =
      /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; // eslint-disable-line

    switch (type) {
      case EMAIL:
        return mailRegExp.test(value);
      default:
        return true;
    }
  }

  message(type, field) {
    switch (type) {
      case REQUIRED:
        return `Pole ${field} jest wymagane`;
      case TYPE:
        return `Pole ${field} ma nieprawidłowy format`;
      case SUCCESS:
        return `Dziękujemy za zgłoszenie do newslettera`;
    }
  }

  displayMessage(message, type = ERROR) {
    if (!this.messageBox) return;

    window.setTimeout(() => {
      if (this.spinner) {
        this.spinner.classList.add('hidden');
      }

      if (type === SUCCESS) {
        this.messageBox.classList.remove('text-red');
        this.messageBox.classList.add('text-green');
      } else {
        this.messageBox.classList.add('text-red');
        this.messageBox.classList.remove('text-green');
      }

      this.messageBox.innerHTML = message;
      this.messageBox.classList.remove('opacity-0');

      if (type === SUCCESS) {
        this.clearInputs();
      }
    }, TRANSITION_DURATION);
  }

  clearInputs() {
    for (let input of this.inputs) {
      input.value = '';
    }
  }

  init() {
    this.form.addEventListener('submit', this.handleSubmit.bind(this));

    this.messageBox.classList.add('transition-opacity');
  }
}
