<?php session_start(); ?>
<html>
<head>
	<title>Iniciar sesión</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contrasena = mysqli_real_escape_string($mysqli, $_POST['contrasena']);

	if($usuario == "" || $contrasena == "") {
		echo "El campo de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='login.php'>Volver</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena=md5('$contrasena')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$fila = mysqli_fetch_assoc($resultado);
		
		if(is_array($fila) && !empty($fila)) {
			$usuario_valido = $fila['usuario'];
			$_SESSION['valido'] = $usuario_valido;
			$_SESSION['nombre'] = $fila['nombre'];
			$_SESSION['id'] = $fila['id']; 
		} else {
			echo "Nombre de usuario o contraseña no válidos.";
			echo "<br/>";
			echo "<a href='iniciar.php'>Volver</a>";
		}

		if(isset($_SESSION['valido'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar sesión</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
