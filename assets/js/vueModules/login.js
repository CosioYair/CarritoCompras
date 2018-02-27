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
  axios.post('login/loginUser', {
    email: login.prop.email,
    password: login.prop.password
  }).then(response => {
    console.log(response.date);
  });
}

module.exports = login;
