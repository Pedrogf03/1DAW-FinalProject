<?php

if($_SESSION['idUser'] == null){
  header("Location: ../index.php");
}

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombreV = $_POST['nombreV'];
    $desarrollador = $_POST['desarrollador'];

    $errores = array();

    if(empty($nombreV) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.\-: ]+/",$nombreV) || strlen($nombreV) > 50){
        $errores['nombreV'] = 'El nombre no es válido';
    }

    if(empty($desarrollador) || !preg_match("/[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.\-: ]+/",$desarrollador) || strlen($desarrollador) > 50){
      $errores['desarrollador'] = 'El desarrollador no es válido';
    }

    if(count($errores) == 0){

        try{
          $insert = "INSERT INTO `videojuego` (`nombre`, `desarrollador`) VALUES ('$nombreV', '$desarrollador');";
          $guardar = mysqli_query($db, $insert);
          $correcto = "Juego añadido correctamente";
          $_SESSION['correcto'] = $correcto;
        } catch (Exception $e){
          $errores['nombreVR'] = 'Ese juego ya existe';
          $_SESSION["errores_entrada"] = $errores;
          var_dump($_SESSION);
      }

    } else {
        $_SESSION["errores_entrada"] = $errores;
        var_dump($_SESSION);
    }

    header("Location: ../html/addJuego.php");

}