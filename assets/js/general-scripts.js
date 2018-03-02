var form = require('./vueModules/form.js');
var login = require('./vueModules/login.js');
var cart = require('./vueModules/cart.js');
var products = require('./vueModules/products.js');
var app = new Vue({
  el: '#app',
  created() {
    this.products.method.getCategories();
    this.cart.method.getDiscount();
    this.login.method.getUser();
    this.products.method.getProducts();
    this.cart.method.getProductsSession();
    this.products.method.getProductsByCategory();
  },
  data: {
    login:    login,
    cart:     cart,
    products: products,
    form:     form
  },
  methods: {

  }
});
