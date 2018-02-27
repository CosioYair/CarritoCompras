import axios from 'axios';
var login = {
  prop: {
    errorMessage: "Usuario o contrasena invalida",
    email: '',
    password: ''
  },
  method: {
    loginUser: loginUser
  }
}

function loginUser(){
  $.post("login/loginUser",{email: login.prop.email}, function(result){
    console.log(result)
  });
}

module.exports = login;
