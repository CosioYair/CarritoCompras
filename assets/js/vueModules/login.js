var login = {
  prop: {
    showErrorMessage: false,
    errorMessage: "Usuario o contrasena invalida",
    email: '',
    password: '',
    user: {}
  },
  method: {
    loginUser: loginUser,
    logout: logout,
    getUser: getUser
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

function getUser(){
  $.get("login/getUser", result => {
    login.prop.user = result;
  });
}

module.exports = login;
