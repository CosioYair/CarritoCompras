var cart = {
  prop: {
    productsCart: [],
    subtotal: 0
  },
  method: {
    addToCart: addToCart,
    removeToCart: removeToCart,
    calculateSubtotal: calculateSubtotal
  }
}

function addToCart(product){
  if(cart.prop.productsCart.findIndex(i => i.codigo === product.codigo) < 0){
    cart.prop.productsCart.push(product);
    cart.method.calculateSubtotal();
  }
}

function removeToCart(index){
  cart.prop.productsCart.splice(index, 1);
  cart.method.calculateSubtotal();
}

function calculateSubtotal(){
  cart.prop.productsCart.map(product => {
    cart.prop.subtotal += parseInt(product.precio);
  });
}

module.exports = cart;
