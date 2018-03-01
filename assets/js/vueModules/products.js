var products = {
  prop: {
    productsHome: []
  },
  method: {
    getProducts: getProducts
  }
}

function getProducts(){
  $.get("cart/getProductos", result => {
    products.prop.productsHome = result.response;
  });
}

module.exports = products;
