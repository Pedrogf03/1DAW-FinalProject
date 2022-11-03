<?php

if($_SESSION['idUser'] == null){
  header("Location: ../index.php");
}

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];

    $errores = array();

    if(empty($nombre) || !preg_match("/[A-Za-z0-9_.ÑñÁÉÍÓÚáéíóúÇç]+/",$nombre) || strlen($nombre) > 30){
        $errores['nombreR'] = 'El nombre de usuario no es válido';
    }
  
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100){
        $errores['emailR'] = 'El email no es válido';
    }

    if(empty($passwd) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+/",$passwd) || strlen($passwd) > 50){
      $errores['passwdR'] = 'La contraseña no es válida';
    }

    if(count($errores) == 0){

        try{
          $hash = password_hash($passwd, PASSWORD_DEFAULT);
          $insert = "INSERT INTO `usuario` (`nombre`, `email`, `contraseña`) VALUES ('$nombre', '$email', '$hash');";
          $guardar = mysqli_query($db, $insert);
          $selectUser = mysqli_query($db, "SELECT idUsuario, nombre FROM usuario WHERE email = '$email';");
          $user = mysqli_fetch_array($selectUser);
          $_SESSION['idUser'] = $user['idUsuario'];
          $_SESSION['nombreUsuario'] = $user['nombre'];
          header("Location: ../html/inicio.php");
        } catch (Exception $e){
          $errores['emailR'] = 'El email ya existe';
          $_SESSION["errores_entrada"] = $errores;
          var_dump($_SESSION);
          header("Location: ../index.php");
        }

    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
        header("Location: ../index.php");
    }

}