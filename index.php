<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcun icon" href="img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="php/guardarUser.php">
      <input type="text" placeholder="Nombre de usuario" name="nombre" pattern="[A-Za-z0-9_.ÑñÁÉÍÓÚáéíóúÇç]+" maxlength="30" />
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'nombreR') : ''; ?>

      <input type="email" placeholder="Correo electrónico" name="email" maxlength="100" pattern="[A-Za-z0-9_.@]+"/>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'emailR') : ''; ?>

      <input type="password" placeholder="Contraseña" name="passwd" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+"/>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'passwdR') : ''; ?>

      <input type="submit" value="Crear cuenta" id="button">
      <p class="message">¿Ya estás registrado? <a href="#">Inicia Sesión</a></p>
    </form>
    <form class="login-form" method="post" action="php/validaUser.php">
      <input type="email" placeholder="Correo electrónico" name="email" maxlength="100" pattern="[A-Za-z0-9_.@]+"/>

      <input type="password" placeholder="Contraseña" name="passwd" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+"/>
      
      <input type="submit" value="Iniciar sesión" id="button">
      <p class="message">¿No estás registrado? <a href="#">Crear cuenta</a></p>
    </form>
    <?php borrarErrores(); ?>
  </div>
</div>
<script>
  $('.message a').click(function() {
    $('form').animate({
      height: "toggle",
      opacity: "toggle"
      }, "slow");
  });
</script>

</body>
</html>