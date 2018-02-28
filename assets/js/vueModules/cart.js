var cart = {
  prop: {
    productsCart: []
  },
  method: {
    addToCart: addToCart,
    removeToCart: removeToCart
  }
}

function addToCart(product){
  if(cart.prop.productsCart.findIndex(i => i.codigo === product.codigo) < 0)
    cart.prop.productsCart.push(product);
}

function removeToCart(index){
  cart.prop.productsCart.splice(index, 1);
}

module.exports = cart;
