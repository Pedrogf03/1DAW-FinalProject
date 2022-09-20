<?php

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombre = $_POST['nombre'];
    $idUsuario = $_SESSION['idUser'];

    $errores = array();

    if(empty($nombre) || !preg_match("/[A-Za-z0-9_.]+/",$nombre) || strlen($nombre) > 30){
        $errores['nombreR'] = 'El nombre de usuario no es válido';
    }

    if(count($errores) == 0){

        try{
          $update = "UPDATE usuario SET nombre = '$nombre' WHERE idUsuario = '$idUsuario';";
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