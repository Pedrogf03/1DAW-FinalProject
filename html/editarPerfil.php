<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  require_once '../includes/conexion.php';
  require_once '../includes/helpers.php';
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link rel="stylesheet" href="../css/update.css">
    <link rel="shortcun icon" href="../img/logo.png">
</head>
<?php
if($_SESSION['idUser'] == null){
    header("Location: ../index.php");
}
$idUsuario = $_SESSION['idUser'];
$select = mysqli_query($db, "SELECT nombre, email, contraseña FROM usuario WHERE idUsuario = '$idUsuario';");
$usuario = mysqli_fetch_array($select);
$nombreU = $usuario['nombre'];
$emailU = $usuario['email'];
$passwdU = $usuario['contraseña'];
?>
<body>
  <div class="pagina">
        <div class="header">
            <h1>Bienvenido <?php echo $_SESSION['nombreUsuario']; ?></h1>
        </div> <!--header-->
        <div class="navegacion">
            <nav id="menu">
				<ul>
					<li>
						<a href="inicio.php">Mi lista</a>
					</li>
					<li>
						<a href="listaJuegos.php">Juegos disponibles</a>
					</li>
                    <li>
						<a href="#">Editar perfil</a>
					</li>
                    <li>
						<a href="../php/cerrarSesion.php">Cerrar sesión</a>
					</li>
				</ul>
			</nav>
        </div> <!--navegacion-->
        <div class="contenido">
            <h1>Tu cuenta:</h1>	
            <table>
              <form action="../php/updateUser.php" method="POST">
                <tr>
                  <td class="th"><p>Nombre de usuario</p></td>
                  <td><?php echo $nombreU ?></td>
                  <td><input type="text" placeholder="Nuevo nombre" name="nombre" pattern="[A-Za-z0-9_.ÑñÁÉÍÓÚáéíóúÇç]+" maxlength="30" /></td>
                </tr>
                <tr>
                  <td colspan="3"><?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'nombreR') : ''; ?></td>
                </tr>
                <tr>
                <td class="th"><p>Correo electrónico</p></td>
                  <td><?php echo $emailU ?></td>
                  <td><input type="text" placeholder="Nuevo email" name="email" maxlength="100" pattern="[A-Za-z0-9_.@]+"/></td>
                </tr>
                <tr>
                <td colspan="3"><?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'emailR') : ''; ?></td>
                </tr>
                <tr>
                <td class="th"><p>Contraseña</p></td>
                  <td><input type="password" placeholder="Contraseña actual" name="actualPasswd" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+"/></td>
                  <td><input type="password" placeholder="Contraseña nueva" name="nuevaPasswd" maxlength="50" pattern="[A-Za-z0-9ÑñÁÉÍÓÚáéíóúÇç_.]+"/></td>
                </tr>
                <tr>
                  <td colspan="3">
                    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'passwdR') : ''; ?>
                    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'incorrectoL') : ''; ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" id="guardar"><input type="submit" value="Aplicar cambios"></td>
                </tr>
              </form>
              <?php borrarErrores(); ?>
            </table>
        </div> <!--contenido-->
    </div> <!--pagina-->
</body>
</html>