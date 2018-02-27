<!DOCTYPE html>
<html>
<head>
<title>vinos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/png" href="http://www.cineyaccion.com/wp-content/uploads/favicon.png"/>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 100px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<div id="app">
  <div class="imgcontainer">
    <img src="http://bashooka.com/wp-content/uploads/2012/07/wine-logo-designs-2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Correo</b></label>
    <input v-model="login.prop.email" type="text" placeholder="Ingresa correo" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input v-model="login.prop.password" type="password" placeholder="Ingresa contrasena" name="psw" required>

    <label for="psw"><b>{{ login.prop.errorMessage }}</b></label>
    <button @click="login.method.loginUser" type="button">Login</button>
  </div>
</div>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/vue.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url(); ?>build/bundle.js"></script>
</body>
</html>
