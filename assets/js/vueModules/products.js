var products = {
  prop: {
    productsHome: [],
    categoires: [],
    mainCategoires: [],
    productsCategory: [],
    titleCategory: "",
  },
  method: {
    getProducts: getProducts,
    getCategories: getCategories,
    getProductsByCategory: getProductsByCategory,
    getTitleCategory: getTitleCategory,
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
    products.method.getTitleCategory();
  });
}

function getTitleCategory(){
  $.get("cart/getTitleCategory", result => {
    products.prop.titleCategory = result[0].nombre;
  });
}

module.exports = products;
