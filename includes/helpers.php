<?php

// Muestra los errores que nos devuelven en la sesión.

function mostrarError($errores, $campo){
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
	}
	
	return $alerta;
}

// Elimina los errores de la sesión

function borrarErrores(){
	$borrado = false;
	
	if(isset($_SESSION['errores'])){
		$_SESSION['errores'] = null;
		$borrado = true;
	}
	
	if(isset($_SESSION['errores_entrada'])){
		$_SESSION['errores_entrada'] = null;
		$borrado = true;
	}
	
	
	return $borrado;
}

// Obtiene todos los alumnos de la BBDD

function obtenerTodosJuegos($conexion){
    
    $sql = "SELECT nombre, desarrollador FROM videojuego ORDER BY nombre ASC ;";
    $juegos = mysqli_query($conexion, $sql);
    
    $resultado = [];
    
    if($juegos && mysqli_num_rows($juegos) >= 1){
        $resultado = $juegos;
    }
    
    return $resultado;
    
}

function obtenerJuegosdeUsuario($conexion, $user){
    
    $sql = "SELECT nombre, desarrollador FROM videojuego WHERE idVideojuego IN (SELECT idVideojuego FROM usuariovideojuego WHERE idUsuario = '$user');";
    $juegos = mysqli_query($conexion, $sql);
    
    $resultado = [];
    
    if($juegos && mysqli_num_rows($juegos) >= 1){
        $resultado = $juegos;
    }
    
    return $resultado;
    
}