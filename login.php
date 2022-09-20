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
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcun icon" href="img/logo.png">
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="php/validaUser.php">
      <input type="email" placeholder="Correo electrónico" name="email" maxlength="100" pattern="[A-Za-z0-9_.@]+"/>

      <input type="password" placeholder="Contraseña" name="passwd" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+"/>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'incorrectoL') : ''; ?>
      
      <input type="submit" value="Iniciar sesión" id="button">
      <p class="message">¿No estás registrado? <a href="index.php">Crear cuenta</a></p>
    </form>
    <?php borrarErrores(); ?>
  </div>
</div>

</body>
</html>