<?php

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $actualPasswd = $_POST['actualPasswd'];
    $nuevaPasswd = $_POST['nuevaPasswd'];
    $idUsuario = $_SESSION['idUser'];

    $select = mysqli_query($db, "SELECT nombre, email, contraseña FROM usuario WHERE idUsuario = '$idUsuario';");
    $datos = mysqli_fetch_array($select);

    $errores = array();

    if(empty($nombre)) {
      $nombre = $datos['nombre'];
    }

    if(!preg_match("/[A-Za-z0-9_.]+/",$nombre) || strlen($nombre) > 30){
        $errores['nombreR'] = 'El nombre de usuario no es válido';
    }

    if(empty($email)) {
      $email = $datos['email'];
    }
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100){
       $errores['emailR'] = 'El email no es válido';
    }

    if(!empty($actualPasswd)) {
      if(empty($nuevaPasswd) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/",$nuevaPasswd) || strlen($nuevaPasswd) > 50){
        $errores['passwdR'] = 'La nueva contraseña no es válida';
      }
  
      if(!preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/",$actualPasswd) || strlen($actualPasswd) > 50){
        $errores['passwdR'] = 'Contraseña incorrecta';
      }
  
      if(!password_verify($actualPasswd, $datos['contraseña'])) {
        $errores['incorrectoL'] = 'Contraseña incorrecta';
      }
    }

    if(count($errores) == 0){

        try{
          $hash = password_hash($nuevaPasswd, PASSWORD_DEFAULT);
          $update = "UPDATE usuario SET nombre = '$nombre', email = '$email', contraseña = '$hash' WHERE idUsuario = '$idUsuario';";
          $guardar = mysqli_query($db, $update);
          $selectUser = mysqli_query($db, "SELECT idUsuario, nombre FROM usuario WHERE email = '$email';");
          $user = mysqli_fetch_array($selectUser);
          $_SESSION['idUser'] = $user['idUsuario'];
          $_SESSION['nombreUsuario'] = $user['nombre'];
          $correcto = "Se han aplicado los cambios correctamente";
          $_SESSION['correcto'] = $correcto;
          header("Location: ../html/editarPerfil.php");
        } catch (Exception $e){
          $errores['emailR'] = 'El email ya existe';
          $_SESSION["errores_entrada"] = $errores;
          var_dump($_SESSION);
          header("Location: ../html/editarPerfil.php");
        }

    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
        header("Location: ../html/editarPerfil.php");
    }

}