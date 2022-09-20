<?php
// Conexión
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'videojuegos';

try{
	$db = mysqli_connect($servidor, $usuario, $password, $basededatos);
} catch (Exception $e) {
	header("Location: html/errorInesperado.php");
}


mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}
