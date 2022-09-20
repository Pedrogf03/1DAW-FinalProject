<?php

if($_SESSION['idUser'] == null){
  header("Location: ../index.php");
}

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $errores = array();
  
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100){
      $errores['incorrectoL'] = 'Email o contraseña incorrectos';
    }

    if(empty($passwd) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/",$passwd) || strlen($passwd) > 50){
      $errores['incorrectoL'] = 'Email o contraseña incorrectos';
    }

    $select = mysqli_query($db, "SELECT contraseña FROM usuario WHERE email = '$email';");
    $contra = mysqli_fetch_array($select);
    if(!password_verify($passwd, $contra['contraseña'])) {
      $errores['incorrectoL'] = 'Email o contraseña incorrectos';
    }

    $select = mysqli_num_rows(mysqli_query($db, "SELECT email FROM usuario WHERE email = '$email';"));
    if($select == 0) {
      $errores['emailL'] = 'El email no existe';
    }

    if(count($errores) == 0){
      $selectUser = mysqli_query($db, "SELECT idUsuario, nombre FROM usuario WHERE email = '$email';");
      $user = mysqli_fetch_array($selectUser);
      $_SESSION['idUser'] = $user['idUsuario'];
      $_SESSION['nombreUsuario'] = $user['nombre'];
      header("Location: ../html/inicio.php");
    } else {
      $_SESSION["errores_entrada"] = $errores;
      var_dump($_SESSION);
      header("Location: ../login.php");
    }

}