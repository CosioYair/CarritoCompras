var products = {
  prop: {
    productsHome: [],
    categoires: [],
    mainCategoires: [],
  },
  method: {
    getProducts: getProducts,
    getCategories:getCategories,
  }
}

function getProducts(){
  $.get("cart/getProductos", result => {
    products.prop.productsHome = result.response;
  });
}

function getCategories(){
  $.get("cart/getCategories", result => {
    products.prop.categories = result.response;
    products.prop.mainCategories = result.response.slice(0,4);
    console.log(products.prop.categories)
  });
}

module.exports = products;
