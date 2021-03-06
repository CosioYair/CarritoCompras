var cart = {
  prop: {
    productsCart: [],
    subtotal: 0,
    subtotalDiscount: 0,
    discount: 0,
    descriptionOrder: "",
    dateOrder: ""
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
    applyDiscount: applyDiscount,
    saveDiscount: saveDiscount,
    getDiscount: getDiscount,
    registerOrder: registerOrder,
    saveDetails: saveDetails,
  }
}

function addToCart(product){
  if(cart.prop.productsCart.findIndex(i => i.codigo === product.codigo) < 0){
    swal(product.nombre, "Producto agregado al carrito", "success");
    product.cantidadCarrito = 1;
    product.cantidadPrecioCarrito = parseInt(product.precio);
    cart.prop.productsCart.push(product);
    cart.method.updateCart();
  }else{
    swal(product.nombre, "El producto ya se encuentra dentro del carrito", "error");
  }
}

function removeToCart(index){
  cart.prop.productsCart.splice(index, 1);
  cart.method.updateCart();
}

function calculateSubtotal(){
  cart.prop.subtotal = 0;
  cart.prop.productsCart.map(product => {
    cart.prop.subtotal += parseInt(product.cantidadPrecioCarrito);
  });
  cart.method.applyDiscount();
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

function plusOne(index){
  cart.prop.productsCart[index].cantidadCarrito++;
  cart.prop.productsCart[index].cantidadPrecioCarrito = parseInt(cart.prop.productsCart[index].cantidadPrecioCarrito) + parseInt(cart.prop.productsCart[index].precio);
  cart.method.updateCart();
}

function subtractOne(index){
  if(cart.prop.productsCart[index].cantidadCarrito > 1){
    cart.prop.productsCart[index].cantidadCarrito--;
    cart.prop.productsCart[index].cantidadPrecioCarrito = parseInt(cart.prop.productsCart[index].cantidadPrecioCarrito) - parseInt(cart.prop.productsCart[index].precio);
    cart.method.updateCart();
  }
}

function updateCart(){
  cart.method.calculateSubtotal();
  cart.method.saveProductsSession();
}

function applyDiscount(){
  cart.prop.subtotalDiscount = (cart.prop.subtotal * (100 - cart.prop.discount))/100;
}

function saveDiscount(){
  $.post("cart/saveDiscount", {
    discount: cart.prop.discount
  }, result => {

  });
}

function getDiscount(){
  $.get("cart/getDiscount", result => {
    cart.prop.discount = result;
  });
}

function registerOrder(){
  $.get("cart/registerOrder", result => {
    if(result.code == 200){
      let message = alert(result.message);
      window.location.replace('home');
    }
    else
      alert(result.message)
  });
}

function saveDetails(){
  if(cart.prop.dateOrder != ""){
    $.post("cart/saveDetails", {
      description: cart.prop.descriptionOrder,
      date: cart.prop.dateOrder
    }, result => {
      cart.method.registerOrder();
    });
  }
  else
    alert("Es necesario indicar una fecha de entrega")
}
function printElem(divId='id') {
  if ($('.datepicker').val()){
    var divToPrint = document.getElementById('id');
        var popupWin = window.open('', '_blank', 'width=800,height=600,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="http://127.0.0.1/c/assets/css/print.css" rel="stylesheet" type="text/css"></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        popupWin.document.close();
  }
}
module.exports = cart;
