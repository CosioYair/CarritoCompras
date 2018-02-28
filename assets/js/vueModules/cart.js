var cart = {
  prop: {
    productsCart: [],
    subtotal: 0
  },
  method: {
    addToCart: addToCart,
    removeToCart: removeToCart,
    calculateSubtotal: calculateSubtotal,
    saveProductsSession: saveProductsSession,
    getProductsSession: getProductsSession
  }
}

function addToCart(product){
  if(cart.prop.productsCart.findIndex(i => i.codigo === product.codigo) < 0){
    product.cantidadCarrito = 1;
    product.cantidadPrecioCarrito = parseInt(product.precio);
    cart.prop.productsCart.push(product);
    cart.method.calculateSubtotal();
    cart.method.saveProductsSession();
  }
}

function removeToCart(index){
  cart.prop.productsCart.splice(index, 1);
  cart.method.calculateSubtotal();
  cart.method.saveProductsSession();
}

function calculateSubtotal(){
  cart.prop.subtotal = 0;
  cart.prop.productsCart.map(product => {
    cart.prop.subtotal += parseInt(product.precio);
  });
}

function saveProductsSession(){
  $.post("cart/saveProductsSession", {
    productsCart: cart.prop.productsCart
  }, result => {

  });
}

function getProductsSession(){
  $.get("cart/getProductsSession", result => {
    cart.prop.productsCart = result;
    cart.method.calculateSubtotal();
  });
}

module.exports = cart;
