<?php

if(isset($_POST)){

    require_once '../includes/conexion.php';

    $nombreV = $_POST['nombreV'];
    $idUser = $_SESSION['idUser'];

    $select = mysqli_query($db, "SELECT idVideojuego FROM videojuego WHERE nombre = '$nombreV';");
    $videojuego = mysqli_fetch_array($select);

    $idVideojuego =  $videojuego['idVideojuego'];

    $delete = "DELETE FROM `usuarioVideojuego` WHERE idUsuario = '$idUser' AND idVideojuego = '$idVideojuego'";
    $borrar = mysqli_query($db, $delete);

    header("Location: ../html/inicio.php");

}