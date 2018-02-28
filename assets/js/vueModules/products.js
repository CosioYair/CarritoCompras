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
    console.log(products.prop.productsHome);
  });
}

module.exports = products;
