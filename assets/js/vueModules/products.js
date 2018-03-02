var products = {
  prop: {
    productsHome: [],
    categoires: [],
    mainCategoires: [],
    productsCategory: [],
  },
  method: {
    getProducts: getProducts,
    getCategories: getCategories,
    getProductsByCategory: getProductsByCategory,
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
  });
}

function getProductsByCategory(){
  $.get("cart/getProductsByCategory", result => {
    products.prop.productsCategory = result;
  });
}

module.exports = products;
