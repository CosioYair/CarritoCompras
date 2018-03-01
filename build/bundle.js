/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(1);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var form = __webpack_require__(2);
var login = __webpack_require__(3);
var cart = __webpack_require__(4);
var products = __webpack_require__(5);
var app = new Vue({
  el: '#app',
  created: function created() {
    this.products.method.getProducts();
    this.cart.method.getProductsSession();
  },

  data: {
    login: login,
    cart: cart,
    products: products,
    form: form
  },
  methods: {}
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var form = {
  prop: {
    errorMessage: "formmmm"
  },
  method: {}
};

module.exports = form;

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var login = {
  prop: {
    showErrorMessage: false,
    errorMessage: "Usuario o contrasena invalida",
    email: '',
    password: ''
  },
  method: {
    loginUser: loginUser,
    logout: logout
  }
};

function loginUser() {
  $.post("login/loginUser", {
    email: login.prop.email,
    password: login.prop.password
  }, function (result) {
    console.log(result);
    if (result == 'null') login.prop.showErrorMessage = true;else {
      if (result.empleado == 2) window.location.replace('dashboard');else window.location.replace('home');
    }
  });
}

function logout() {
  $.get("middleware/deleteSessionVariables");
  window.location.reload();
}

module.exports = login;

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var cart = {
  prop: {
    productsCart: [],
    subtotal: 0,
    subtotalDiscount: 0,
    discount: 0
  },
  method: {
    addToCart: addToCart,
    removeToCart: removeToCart,
    calculateSubtotal: calculateSubtotal,
    saveProductsSession: saveProductsSession,
    getProductsSession: getProductsSession,
    plusOne: plusOne,
    subtractOne: subtractOne,
    updateCart: updateCart,
    applyDiscount: applyDiscount
  }
};

function addToCart(product) {
  if (cart.prop.productsCart.findIndex(function (i) {
    return i.codigo === product.codigo;
  }) < 0) {
    product.cantidadCarrito = 1;
    product.cantidadPrecioCarrito = parseInt(product.precio);
    cart.prop.productsCart.push(product);
    cart.method.updateCart();
  }
}

function removeToCart(index) {
  cart.prop.productsCart.splice(index, 1);
  cart.method.updateCart();
}

function calculateSubtotal() {
  cart.prop.subtotal = 0;
  cart.prop.productsCart.map(function (product) {
    cart.prop.subtotal += parseInt(product.cantidadPrecioCarrito);
  });
  cart.method.applyDiscount();
}

function saveProductsSession() {
  $.post("cart/saveProductsSession", {
    productsCart: cart.prop.productsCart
  }, function (result) {});
}

function getProductsSession() {
  $.get("cart/getProductsSession", function (result) {
    cart.prop.productsCart = result;
    cart.method.calculateSubtotal();
  });
}

function plusOne(index) {
  cart.prop.productsCart[index].cantidadCarrito++;
  cart.prop.productsCart[index].cantidadPrecioCarrito = parseInt(cart.prop.productsCart[index].cantidadPrecioCarrito) + parseInt(cart.prop.productsCart[index].precio);
  cart.method.updateCart();
}

function subtractOne(index) {
  if (cart.prop.productsCart[index].cantidadCarrito > 1) {
    cart.prop.productsCart[index].cantidadCarrito--;
    cart.prop.productsCart[index].cantidadPrecioCarrito = parseInt(cart.prop.productsCart[index].cantidadPrecioCarrito) - parseInt(cart.prop.productsCart[index].precio);
    cart.method.updateCart();
  }
}

function updateCart() {
  cart.method.calculateSubtotal();
  cart.method.saveProductsSession();
}

function applyDiscount() {
  cart.prop.subtotalDiscount = cart.prop.subtotal * (100 - cart.prop.discount) / 100;
}

module.exports = cart;

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var products = {
  prop: {
    productsHome: []
  },
  method: {
    getProducts: getProducts
  }
};

function getProducts() {
  $.get("cart/getProductos", function (result) {
    products.prop.productsHome = result.response;
    console.log(products.prop.productsHome);
  });
}

module.exports = products;

/***/ })
/******/ ]);