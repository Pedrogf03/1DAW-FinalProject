<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require_once '../includes/conexion.php';
  require_once '../includes/helpers.php';
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="shortcun icon" href="../img/logo.png">
</head>
<?php if($_SESSION['idUser'] == null){
    header("Location: ../index.php");
}
?>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="../php/guardarJuego.php">
      <input type="text" placeholder="Nombre" name="nombreV" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.\-: ]+"/>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'nombreV') : ''; ?>

      <input type="text" placeholder="Desarrollador" name="desarrollador" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.\-: ]+"/>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'desarrollador') : ''; ?>
      <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'nombreVR') : ''; ?>
      <?php echo isset($_SESSION['correcto']) ? $_SESSION['correcto'] : ''; ?>
      
      <input type="submit" value="Añadir" id="button">
      <p class="message"><a href="listaJuegos.php">Volver</a></p>
    </form>
    <?php
        borrarErrores();
        $_SESSION['correcto'] = "";
    ?>
  </div>
</div>

</body>
</html>