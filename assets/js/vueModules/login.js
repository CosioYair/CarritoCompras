var login = {
  prop: {
    showErrorMessage: false,
    errorMessage: "Usuario o contrasena invalida",
    email: '',
    password: ''
  },
  method: {
    loginUser: loginUser
  }
}

function loginUser(){
  $.post("login/loginUser", {
    email: login.prop.email,
    password: login.prop.password
  }, result => {
    console.log(result);
      login.prop.showErrorMessage = true;
    if(result == null)
      login.prop.showErrorMessage  = true;
    else{
      if(result.empleado == 2)
        window.location.replace('c/dashboard');
      else
        window.location.replace('c/home');
    }
  });
}

module.exports = login;
