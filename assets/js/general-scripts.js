var form = require('./vueModules/form.js');
var login = require('./vueModules/login.js');
var cart = require('./vueModules/cart.js');
var products = require('./vueModules/products.js');
var app = new Vue({
  el: '#app',
  created() {
    this.products.method.getProducts()
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
