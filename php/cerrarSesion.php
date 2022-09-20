<?php

require_once '../includes/conexion.php';

$_SESSION['idUser'] = null;

session_destroy();

header("Location: ../index.php");