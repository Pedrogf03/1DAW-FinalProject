<?php

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombreV = $_POST['nombreV'];
    $idUser = $_SESSION['idUser'];

    $errores = array();

    $select = mysqli_query($db, "SELECT idVideojuego FROM videojuego WHERE nombre = '$nombreV';");
    $videojuego = mysqli_fetch_array($select);

    $idVideojuego =  $videojuego['idVideojuego'];

    try {
      $insert = "INSERT INTO `usuariovideojuego` VALUES ('$idUser', '$idVideojuego');";
      $guardar = mysqli_query($db, $insert);
      $correcto = "Juego añadido correctamente";
      $_SESSION['correcto'] = $correcto;
    } catch (Exception $e) {
      $errores['alreadyAdded'] = 'Ya tienes este juego en tu lista';
      $_SESSION["errores_entrada"] = $errores;
    }

    header("Location: ../html/listaJuegos.php");

}