export default class CartUpdate {
  constructor(cartUpdateBtn) {
    this.cartUpdate = cartUpdateBtn;
    this.cartCount = document.getElementById('cartCount');
    this.removeBtns = Array.from(
      document.querySelectorAll('.product-remove a'),
    );
    this.cartForm = document.querySelector('.woocommerce form');

    this.init();
  }

  handleCartUpdate() {
    const qtyInputs = Array.from(document.querySelectorAll('input.qty'));
    let cartCount = 0;

    for (let input of qtyInputs) {
      cartCount += Number(input.value);
    }

    if (this.cartCount) {
      if (cartCount > 0) {
        this.cartCount.innerHTML = cartCount;
      } else {
        this.cartCount.classList.add('hidden');
      }
    }
  }

  handleCartRemove() {
    const interval = window.setInterval(() => {
      if (!this.cartForm.classList.contains('processing' || !this.form)) {
        this.handleCartUpdate();
        window.clearInterval(interval);
      }
    }, 100);
  }

  init() {
    this.cartUpdate.addEventListener('click', this.handleCartUpdate.bind(this));

    if (this.removeBtns.length) {
      for (let removeBtn of this.removeBtns) {
        removeBtn.addEventListener('click', this.handleCartRemove.bind(this));
      }
    }
  }
}
