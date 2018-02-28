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
}

function loginUser(){
  $.post("login/loginUser", {
    email: login.prop.email,
    password: login.prop.password
  }, result => {
    console.log(result);
    if(result == 'null')
      login.prop.showErrorMessage  = true;
    else{
      if(result.empleado == 2)
        window.location.replace('dashboard');
      else
        window.location.replace('home');
    }
  });
}

function logout(){
  $.get("middleware/deleteSessionVariables");
  window.location.reload();
}

module.exports = login;
